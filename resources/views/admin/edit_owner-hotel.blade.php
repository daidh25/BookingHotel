@extends('layout.owner')

@section('content')
    <div class="container-owner">
        <x-alert-errors />
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
        <div class="table-admin">
            <h3>Chỉnh sửa thông tin chủ khách sạn</h3>
            <form action="{{ route('admin_owner.update', ['user' => $owner->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="username">Tên tài khoản</label>
                    <input type="text" name="username" id="username" class="form-control"
                        value="{{ $owner->username }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $owner->email }}">
                </div>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </form>
        </div>
    </div>
@endsection
