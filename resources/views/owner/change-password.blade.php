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

        <div class="table-owner">
            <section id="form-update" class="owner-changepassword">
                <x-alert-errors />
                <form action="{{ route('password.update', ['user' => $user]) }}" method="POST" id="form">
                    @method('PUT')
                    @csrf
                    <div class="form-title">
                        <h4>Thay đổi mật khẩu</h4>
                    </div>
                    <div class="form-input">
                        <label for="current_password">Mật khẩu hiện tại</label>
                        <input type="password" name="current_password" id="current_password"
                            placeholder="Current password" />
                    </div>
                    <div class="form-input">
                        <label for="new_password">Mật khẩu mới</label>
                        <input type="password" name="new_password" id="new_password" placeholder="New password">
                    </div>
                    <div class="form-input">
                        <label for="new_password_">Nhập lại mật khẩu mới</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirm"
                            placeholder="Confirm new password">
                    </div>
                    <div class="form-btn">
                        <button class="button-submit">Thay đổi</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
