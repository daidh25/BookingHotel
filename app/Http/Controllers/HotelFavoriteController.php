<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelFavorite;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelFavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        // Lấy danh sách khách sạn yêu thích của user
        $favoriteHotelList = User::with(['favoritesHotels' => function ($query) {
            $query->withTrashed();
        }])->find($userId);
        return view('user.favorite-hotels', compact('favoriteHotelList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $hotel_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login.login')->with('error', 'Bạn cần đăng nhập để thêm vào danh sách yêu thích.');
        }

        $userId = Auth::user()->id;

        $existingFavorite = HotelFavorite::where('user_id', $userId)
            ->where('hotel_id', $hotel_id)
            ->first();

        if ($existingFavorite) {
            return redirect()->back()->with('error', 'Khách sạn này đã có trong danh sách yêu thích.');
        }

        try {
            HotelFavorite::create([
                'user_id' => $userId,
                'hotel_id' => $hotel_id
            ]);
            return redirect()->back()->with('success', 'Đã thêm vào danh sách yêu thích');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HotelFavorite  $hotelFavorite
     * @return \Illuminate\Http\Response
     */
    public function show(HotelFavorite $hotelFavorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HotelFavorite  $hotelFavorite
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelFavorite $hotelFavorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HotelFavorite  $hotelFavorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelFavorite $hotelFavorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HotelFavorite  $hotelFavorite
     * @return \Illuminate\Http\Response
     */
    public function destroy($hotel_id)
    {
        $userId = Auth::user()->id; // Lấy user_id của người dùng hiện tại

        try {
            // Tìm bản ghi trong bảng hotel_favorites dựa trên user_id và hotel_id
            $favorite = HotelFavorite::where('user_id', $userId)
                ->where('hotel_id', $hotel_id)
                ->first();

            // Kiểm tra xem có tìm thấy bản ghi không
            if ($favorite) {
                // Thực hiện xóa bản ghi
                $favorite->delete();
                return redirect()->back()->with('success', 'Xoá thành công');
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy khách sạn trong danh sách yêu thích.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã có lỗi xảy ra');
        }
    }
}
