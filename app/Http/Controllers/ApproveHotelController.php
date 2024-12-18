<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Exception;
use Illuminate\Http\Request;

class ApproveHotelController extends Controller
{
    public function index()
    {
        $unapprovedHotels = Hotel::where('admin_accepted', false)->paginate(10);
        return view('admin.admin_manage-hotel', compact('unapprovedHotels'));
    }

    public function approve(Hotel $hotel)
    {
        $hotel->update(['admin_accepted' => true]);
        return redirect()->route('admin.approve_hotels')->with('success', 'Khách sạn đã được duyệt.');
    }

    public function destroy(Hotel $hotel)
    {
        try {
            $hotel->forceDelete();
            return redirect()->back()->with('success', 'Bạn đã từ chối yêu cầu');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Từ chối yêu cầu thất bại');
        }
    }
}
