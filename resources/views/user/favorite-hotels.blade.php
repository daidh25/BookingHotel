@extends('layout.app')

@section('content')
    <div class="container">
        <div class="container-owner">
            <div class="table-owner">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên khách sạn</th>
                            <th>Địa chỉ</th>
                            <th>Giá tiền</th>
                            <th>Tuỳ chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($favoriteHotelList->favoritesHotels->isEmpty())
                            <tr>
                                <td colspan="5">Chưa có khách sạn yêu thích nào.</td>
                            </tr>
                        @else
                            @foreach ($favoriteHotelList->favoritesHotels as $hotel)
                                <tr>
                                    <td>{{ $hotel->id }}</td>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->city }}, {{ $hotel->country }}</td>
                                    <td>{{ $hotel->price }}</td>
                                    <td>
                                        <form action="{{ route('favorite_hotel.destroy', ['hotel_id' => $hotel->id]) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">Xoá</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="sidebar-owner" style="display: flex; flex-direction: column; gap: 20px; align-items: center">
                <h2>DANH SÁCH YÊU THÍCH</h2>
                @if ($favoriteHotelList->avatar)
                    <div style="display: flex; justify-content: center; border-radius: 50%">
                        <img src="{{ asset($favoriteHotelList->avatar->path . '/' . $favoriteHotelList->avatar->name . '.' . $favoriteHotelList->avatar->extension) }}"
                            alt="" style="width: 150px; height: 150px;  border-radius: 50%">
                    </div>
                @endif
                <div style="">
                    <h3 style="font-size: 26px; line-height: 32px">
                        {{ $favoriteHotelList->userInfo->first_name . ' ' . $favoriteHotelList->userInfo->last_name }}</h3>
                </div>
                <div style="">
                    <p style="font-size: 20px; line-height: 32px">Ngày tham gia:
                        {{ $favoriteHotelList->userInfo->created_at }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
