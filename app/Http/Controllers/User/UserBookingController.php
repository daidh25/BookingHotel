<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Http\Requests\EvaluationRequest;
use App\Models\Evaluation;
use App\Models\Hotel;
use App\Models\Booking;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class UserBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userBookingData = Booking::with(['customer', 'hotel' => function ($query) {
            return $query->withTrashed();
        }])->withTrashed()->where('user_id', Auth::user()->id)->paginate(5);
        $histories = Booking::with(['hotel' => function ($query) {
            return $query->withTrashed();
        }, 'customer' => function ($query) {
            return $query->where('id', Auth::user()->id);
        }])->withTrashed()->where('user_id', Auth::user()->id)->paginate(5);
        return view('user.booking-list', compact('userBookingData', 'histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($hotel_id)
    {
        $hotel = Hotel::withTrashed()->where('id', $hotel_id)->first();
        return view('user.booking-create', compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $user_id = auth()->user()->id;
        $hotel_id = $request->input('hotel_id');
        $check_in_date = $request->input('check_in_date');
        $check_out_date = $request->input('check_out_date');
        $num_guests = $request->input('num_guests');
        $num_children = $request->input('num_children');
        $payment_type = $request->input('payment_type');
        $payment_method = $request->input('payment_method');

        // Kiểm tra xem người dùng đã đặt phòng cho khách sạn này trước đó chưa
        $existingBooking = Booking::where('user_id', $user_id)
            ->where('hotel_id', $hotel_id)
            ->first();

        if ($existingBooking) {
            return redirect()->back()->with('error', 'Bạn đã đặt phòng cho khách sạn này rồi.');
        }

        // Tính toán tổng số tiền phải trả
        $hotel = Hotel::withTrashed()->where('id', $hotel_id)->first();
        if ($hotel->deleted_at != null && $hotel) {
            return redirect()->back()->with('error', 'Khách sạn đã cho thuê');
        }
        $pricePerNight = $hotel->price;
        $checkIn = new DateTime($check_in_date);
        $checkOut = new DateTime($check_out_date);
        $totalCost = $pricePerNight * $checkIn->diff($checkOut)->days;

        // Lưu thông tin đặt phòng vào cơ sở dữ liệu
        $booking = new Booking();
        $booking->hotel_id = $hotel_id;
        $booking->check_in = $check_in_date;
        $booking->check_out = $check_out_date;
        $booking->num_people = $num_guests;
        $booking->num_children = $num_children;
        $booking->total_cost = $totalCost;
        $booking->user_id = $user_id;
        $booking->accepted = 0;
        $booking->pay_method = $payment_type;
        $booking->payment_method = $payment_method;

        $hotel->delete();
        $booking->save();

        return redirect()->back()->with('success', 'Đặt phòng thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(EvaluationRequest $request, $hotel_id)
    {
        $pointRate = $request->quality_input;
        $feedbackContent = $request->feedback_input;
        $result = Evaluation::updateOrCreate(
            ['hotel_id' => $hotel_id],
            ['user_id' => auth()->user()->id, 'feedback' => $feedbackContent, 'point' => $pointRate]
        );

        if ($result) {
            return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá!');
        } else {
            return redirect()->back()->with('error', 'Nội dung không hợp lệ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = Booking::query();
        $result = $query->where('id', $id)->forceDelete();
        if ($result) {
            return redirect()->back()->with('success', 'Huỷ đặt phòng thành công');
        }
        return redirect()->back()->with('error', 'Huỷ đặt phòng thất bại');
    }
}
