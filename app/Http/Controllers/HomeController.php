<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::withTrashed()->where('admin_accepted', true)->paginate(8);
        return view('home', ['hotels' => $hotels]);
    }
}