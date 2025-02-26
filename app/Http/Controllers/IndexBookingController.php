<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class IndexBookingController extends Controller
{
    public function index()
    {
        $services = Service::select(['name', 'time', 'price'])
            ->get();

        return view('booking.index', ['services' => $services]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',
        ]);

        return redirect()->route('booking.index')->with('success', 'Booking request sent successfully.');
    }
}
