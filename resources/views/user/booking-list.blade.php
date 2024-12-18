@extends('layout.app')

@section('title', 'Your booking')

@section('content')
    <section class="container grid" id="manage-booking">
        <ul class="navigation">
            <li class="navigation__item room-list-link active"><a href="#" class="navigation__item-link">Phòng đang đặt</a></li>
            <li class="navigation__item booking-history-link"><a href="#" class="navigation__item-link">Lịch sử đặt phòng</a></li>
        </ul>
        <div class="wrapper">
            @include('user.booking-table')
            <div class="pagination">
                {{ $userBookingData->links('vendor.pagination.default') }}
            </div>
        </div>
        <div class="mask"></div>
    </section>
@endsection
