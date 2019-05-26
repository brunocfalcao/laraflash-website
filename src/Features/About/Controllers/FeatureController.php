<?php

namespace Laraflash\Website\Features\About\Controllers;

use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function __construct()
    {
        // Add your middleware, if needed.
    }

    public function show()
    {
        return flame();
    }
}
