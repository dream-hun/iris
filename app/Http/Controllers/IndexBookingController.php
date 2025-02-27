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

        $minDate = Carbon::now()->format('Y-m-d\TH:i');

        return view('booking.index', [
            'services' => $services,
            'minDate' => $minDate
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_id' => 'required|integer',
                'name' => 'required|min:3|max:50',
                'email' => 'required|email',
                'mobile' => 'required|min:10|max:15',
                'date_and_time' => [
                    'required',
                    'date_format:Y-m-d\TH:i',
                    function ($attribute, $value, $fail) {
                        if (Carbon::parse($value)->isPast()) {
                            $fail('The date and time must be in the future.');
                        }
                    },
                ],
            ]);

            // Convert date to panel format
            $validated['date_and_time'] = Carbon::createFromFormat(
                'Y-m-d\TH:i',
                $validated['date_and_time']
            )->format(config('panel.date_format') . ' ' . config('panel.time_format'));

            \Log::info('Booking request data:', $request->all());

            $booking = Booking::create(array_merge($validated, ['status' => 'pending']));
            
            \Log::info('Booking created:', $booking->toArray());

            return redirect()->route('booking.index')->with('success', 'Booking request sent successfully.');
        } catch (\Exception $e) {
            \Log::error('Booking creation failed: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            
            return redirect()->route('booking.index')
                ->withInput()
                ->with('error', 'Failed to create booking: ' . $e->getMessage());
        }
    }
}
