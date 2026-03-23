<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function show(string $slug)
    {
        $viewName = 'landing.' . $slug;

        if (!view()->exists($viewName)) {
            abort(404);
        }

        return view($viewName);
    }
}
