<?php

namespace Laraflash\Website\Features\Contact\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Laraflash\Website\Mail\ContactRequested;
use Laraflash\Website\Features\Contact\FormRequests\StoreFormRequest;

class FeatureController extends Controller
{
    public function show()
    {
        return flame();
    }

    public function store(StoreFormRequest $request)
    {
        // Send email directly to bruno.falcao@laraflash.com.
        Mail::to('bruno.falcao@laraflash.com')
            ->send(new ContactRequested(request('name'), request('email'), request('subject'), request('message')));

        return flame('show');
    }
}
