<?php

namespace App\Repositories\Cts;

use App\Models\Cts\Booking;
use Carbon\Carbon;

class BookingRepository
{
    public function getTodaysBookings()
    {
        $bookings = Booking::where('date', '=', Carbon::now()->toDateString())->get();
        $returnData = collect();

        $bookings->each(function ($booking) use ($returnData) {
            $returnData->push(collect([
               'date' => $booking->date,
               'from' => $booking->from,
               'to' => $booking->to,
               'position' => $booking->position,
               'member' => $this->formatMember($booking),
               'type' => $booking->type,
           ]));
        });

        return $returnData;
    }

    private function formatMember(Booking $booking)
    {
        if ($booking->type == 'EX') {
            return [
                'id' => '',
                'name' => 'Hidden',
            ];
        }

        return [
            'id' => $booking->member->cid,
            'name' => $booking->member->name,
        ];
    }
}
