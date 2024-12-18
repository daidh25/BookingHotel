<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingListController extends Controller
{
    public function index()
    {
        $bookingPendingList = Booking::with(['customer', 'hotel' => function ($query) {
            return $query->where('owner_id', Auth::user()->id)->withTrashed();
        }])->withTrashed()->paginate(10);

        return view('owner.booking-list', compact('bookingPendingList'), [
            'user' => Auth::user()
        ]);
    }
}