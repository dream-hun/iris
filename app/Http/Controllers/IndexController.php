<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $images = Gallery::with('media')->where('positioning', 'hero')->get();

        return view('welcome', ['images' => $images]);
    }

    public function services()
    {
        $services = Service::with(['media'])->get();

        return view('services.index', ['services' => $services]);

    }
}
