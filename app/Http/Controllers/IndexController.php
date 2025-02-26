<?php

namespace App\Http\Controllers;

use App\Models\Service;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {

        return view('welcome');
    }

    public function services()
    {
        $services = Service::with(['media'])->get();

        return view('services.index', ['services' => $services]);

    }
}
