<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use App\Notifications\CustomerBookingNotification;
use App\Notifications\NewBookingNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexBookingController extends Controller
{
    public function index()
    {
        $services = Service::select(['id', 'name', 'duration', 'price'])
            ->get();

        $minDate = Carbon::now()->format('Y-m-d\TH:i');

        return view('booking.index', [
            'services' => $services,
            'minDate' => $minDate,
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
            )->format(config('panel.date_format').' '.config('panel.time_format'));

            $booking = Booking::create(array_merge($validated, ['status' => 'pending']));

            
            User::all()->each(function ($user) use ($booking) {
                $user->notify(new NewBookingNotification($booking));
            });

            return redirect()->route('booking.index')->with('success', 'Booking request sent successfully.');
        } catch (\Exception $e) {

            return redirect()->route('booking.index')
                ->withInput()
                ->with('error', 'Failed to create booking: '.$e->getMessage());
        }
    }
}
