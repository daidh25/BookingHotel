<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Owner;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerManageBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with(['hotels' => function ($query) {
            return $query->withTrashed();
        }])->where('id', Auth::user()->id)->first();
        return view('owner.owner_manage', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.add-hotel', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hotel_id, $booking_id)
    {
        try {
            DB::transaction(function () use ($hotel_id, $booking_id) {
                Booking::where('id', $booking_id)->update(['accepted' => 1]);
                DB::table('bookings')
                    ->where('hotel_id', $hotel_id)
                    ->where('id', '!=', $booking_id)
                    ->where('accepted', 0)
                    ->delete();
                Hotel::where('id', $hotel_id)->delete();
            });
            return redirect()->route('booking-list.index')->with('success', 'Cho thuê thành công');
        } catch (Exception $e) {
            return redirect()->route('booking-list.index')->with('error', 'Cho thuê thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Chức năng trả phòng
     */
    public function destroy($hotel_id, $booking_id)
    {
        try {
            DB::transaction(function () use ($hotel_id, $booking_id) {
                Booking::where('id', $booking_id)->update(['accepted' => 2]);
                Booking::where('id', $booking_id)->delete();
                Hotel::withTrashed()->where('id', $hotel_id)->restore();
            });

            return redirect()->route('booking-list.index')->with('success', 'Trả phòng thành công');
        } catch (Exception $e) {
            return redirect()->route('booking-list.index')->with('error', 'Trả phòng thất bại');
        }
    }
}
