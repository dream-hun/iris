<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IndexBookingController extends Controller
{
    public function index()
    {
        $services = Service::select(['id', 'name', 'duration', 'price'])
            ->get();

        return view('booking.index', ['services' => $services]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|integer',
            'name' => 'required|required|min:3|max:50',
            'email' => 'required|email',
            'mobile' => 'required|min:10|max:15',
            'date_and_time' => [
                'required',
                'date_format:'.config('panel.date_format').' '.config('panel.time_format'),
            ],
        ]);

        try {
            $booking = Booking::create($request->merge(['status' => 'pending'])->all());
        } catch (\Exception $e) {
            return redirect()->route('booking.index')->with('error', 'Failed to create booking. Please try again.');
        }

        return redirect()->route('booking.index')->with('success', 'Booking request sent successfully.');
    }
}
