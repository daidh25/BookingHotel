<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $country = $request->input('country');
        $price = $request->input('price');
        $keyword = $request->input('keyword');

        $query = Hotel::query()->withTrashed();

        // Tìm theo từ khóa
        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->orWhere('name', 'like', '%' . $keyword . '%')
                    ->orWhere('city', 'like', '%' . $keyword . '%')
                    ->orWhere('country', 'like', '%' . $keyword . '%');
            });
        }

        // Tìm theo quốc gia
        if ($country) {
            $query->where('country', $country);
        }

        // Tìm theo giá tiền
        $priceString = '';
        if ($price) {
            switch ($price) {
                case 'under100':
                    $query->where('price', '<', 100);
                    $priceString = 'Dưới $100';
                    break;
                case '100to200':
                    $query->whereBetween('price', [100, 200]);
                    $priceString = '$100 - $200';
                    break;
                case '200to300':
                    $query->whereBetween('price', [200, 300]);
                    $priceString = '$200 - $300';
                    break;
                case 'over300':
                    $query->where('price', '>', 300);
                    $priceString = 'Trên $300';
                    break;
            }
        }

        $hotels = $query->get();

        if ($hotels->isEmpty()) {
            return view('no_results', compact('keyword', 'country', 'priceString'));
        }
        return view('search_results', compact('hotels', 'keyword', 'country', 'price', 'priceString'));
    }
}
