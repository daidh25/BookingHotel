@extends('layout.owner')

@section('content')
<div class="container-owner">
    <div class="sidebar-owner">
        <h2>OWNER DASHBOARD</h2>
        <div class="sidebar-owner__item">
            <a href="{{ route('owner.dashboard') }}" class="sidebar-owner__link">Trang chủ</a>
        </div>
        <div class="sidebar-owner__item">
            <a href="{{ route('owner_manage.index') }}" class="sidebar-owner__link">Quản lý khách sạn</a>
        </div>
        <div class="sidebar-owner__item">
            <a href="{{ route('add-hotel') }}" class="sidebar-owner__link">Thêm khách sạn</a>
        </div>
        <div class="sidebar-owner__item">
            <a href="{{ route('booking-list.index') }}" class="sidebar-owner__link">Quản lý đơn đặt</a>
        </div>
        <div class="sidebar-owner__item">
            <a href="{{ route('owner.edit', ['user' => $user]) }}" class="sidebar-owner__link">Thay đổi mật khẩu</a>
        </div>
        <div class="owner-logout">
            <a href="{{ route('logout') }}">Đăng xuất</a>
        </div>
    </div>

    <div class="content-admin-db">
        <div class="table-admin">
            <h3>Chào mừng {{ $user->username }} đã quay trở lại!</h3>
        </div>
        <div class="banner-admin">
            <img src="../../assets/images/banner.jpg" alt="">
        </div>
    </div>
</div>
@endsection