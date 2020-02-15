<?php

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Laraflash\DAL\Models\Thumbnail;
use Zttp\Zttp;

Route::get('search', 'Laraflash\Website\Features\Search\Controllers\FeatureController@search')->name('search');
Route::get('/', 'Laraflash\Website\Features\Welcome\Controllers\FeatureController@index');

route::get('contact', 'Laraflash\Website\Features\Contact\Controllers\FeatureController@show')->name('contact.show');
route::post('contact', 'Laraflash\Website\Features\Contact\Controllers\FeatureController@store')->name('contact.store');

route::get('about', 'Laraflash\Website\Features\About\Controllers\FeatureController@show')->name('about.show');

route::post('/register-newsletter', 'Laraflash\Website\Features\Welcome\Controllers\FeatureController@registerNewsletter')->name('register.newsletter');

Route::get('images/{width}/{height}/{hash}/{hook?}', function ($width, $height, $hash, $hook = 'center') {
    $targetWidth = $width;
    $targetHeight = $height;

    // Compute filename (database or default.png).
    $thumbnail = Thumbnail::where('hash', $hash)->first();

    if (is_null($thumbnail)) {
        // Grab the data source default image.
        $filename = strtolower($hash);

        // Check if the data source default image exists.
        if (! File::exists(storage_path("app/public/defaults/{$filename}.jpg"))) {
            // Use the default Laraflash news image and resize it.
            $filename = 'default';
        }

        $img = Image::make(storage_path("app/public/defaults/{$filename}.jpg"));

        // Adjust canvas to make the best fit().
        $img->resizeCanvas(
            $img->width() < $targetWidth ? $targetWidth : null,
            $img->height() < $targetHeight ? $targetHeight : null,
            $hook,
            false,
            'ffffff'
        );

        $img->fit($targetWidth, $targetHeight, function ($constraint) {
            $constraint->upsize();
        });

        $img->resizeCanvas($targetWidth, $targetHeight, $hook, false, 'ffffff');

        return $img->response();
    }

    // Identify file location or return default Laraflash image.
    $filePath = File::exists(storage_path("app/public/images/{$thumbnail->filename}")) ?
                storage_path("app/public/images/{$thumbnail->filename}") :
                storage_path('app/public/defaults/default.png');

    // Verify if we have this image already in cache.
    $extension = collect(explode('.', $thumbnail->filename))->pop();
    $fileCachePath = storage_path("app/public/cache/{$thumbnail->hash}_{$width}_{$height}_{$hook}.{$extension}");

    // Check cache.
    if (File::exists($fileCachePath)) {
        header("Content-type: image/{$extension}");
        readfile($fileCachePath);

        return;
    }

    // No cache. Create image.
    try {
        $img = Image::make(str_replace('\\', '/', $filePath));
    } catch (\Exception $exception) {
        $img = Image::make(storage_path('app/public/defaults/default.png'));
    }
    /*
    $img = @Image::make(str_replace('/', '\\', $filePath));

    // Issues with image not readable? Fallback to default.
    if (!$img) {
        $img = Image::make(storage_path('app/public/defaults/default.png'));
    }
    */

    // Adjust canvas to make the best fit().
    $img->resizeCanvas(
        $img->width() < $targetWidth ? $targetWidth : null,
        $img->height() < $targetHeight ? $targetHeight : null,
        $hook,
        false,
        'ffffff'
    );

    $img->fit($targetWidth, $targetHeight, function ($constraint) {
        $constraint->upsize();
    });

    $img->resizeCanvas($targetWidth, $targetHeight, $hook, false, 'ffffff');

    // Save it on cache.
    $img->save($fileCachePath);

    return $img->response();
});

Route::get('medium', function () {
    // https://medium.com/@taylorotwell/latest

    // Grab json request.
    $json = $response = Zttp::get('https://medium.com/@taylorotwell/latest?format=json');

    return response()->json(json_decode(substr($json->body(), 16)));
});
