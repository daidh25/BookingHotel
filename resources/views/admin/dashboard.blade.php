@extends('layout.owner')

@section('content')
<div class="container-owner">
    <div class="sidebar-owner">
        <h2>ADMIN DASHBOARD</h2>
        <div class="sidebar-owner__item">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-owner__link">Trang chủ</a>
        </div>
        <div class="sidebar-owner__item">
            <a href="{{ route('admin_owner.index') }}" class="sidebar-owner__link">Quản lý tài khoản chủ khách sạn</a>
        </div>
        <div class="sidebar-owner__item">
            <a href="{{ route('admin_owner.create') }}" class="sidebar-owner__link">Thêm tài khoản chủ khách sạn</a>
        </div>
        <div class="sidebar-owner__item">
            <a href="{{ route('admin_user.index') }}" class="sidebar-owner__link">Quản lý tài khoản khách hàng</a>
        </div>
        <div class="sidebar-owner__item">
            <a href="{{ route('admin.approve_hotels') }}" class="sidebar-owner__link">Quản lý khách sạn</a>
        </div>
        <div class="owner-logout">
            <a href="{{ route('logout') }}">Đăng xuất</a>
        </div>
    </div>
    <div class="content-admin-db">
        <div class="table-admin">
            <h3>Chào mừng admin đã quay trở lại!</h3>
        </div>
        <div class="banner-admin">
            <img src="../../assets/images/banner.jpg" alt="">
        </div>
    </div>
</div>
@endsection