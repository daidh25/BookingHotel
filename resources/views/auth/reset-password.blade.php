@extends('layout.app')

@section('title', 'Reset password')

@section('content')
    <section id="form-update">
        <x-alert-errors />
        <form method="POST" id="form" action="{{ route('reset_pass.update', ['token' => $token]) }}">
            @csrf
            <div class="form-text">
                <span class="fs-5">Nhập mật khẩu mới</span>
            </div>
            <div class="form-input">
                <label for="token" class="d-block">Code</label>
                <input type="text" class="form-control w-100" name="token_reset" id="token" placeholder="Nhập code">
            </div>
            <div class="form-input">
                <label for="new_password" class="d-block">Mật khẩu mới</label>
                <input type="password" class="form-control w-100" name="new_password" id="new_password"
                    placeholder="Nhập mật khẩu mới">
            </div>
            <div class="form-input">
                <label for="new_password_confirm" class="d-block">Xác nhận mật khẩu mới</label>
                <input type="password" class="form-control w-100" name="new_password_confirmation" id="new_password_confirm"
                    placeholder="Nhập lại mật khẩu mới">
            </div>
            <div class="form-btn">
                <button class="button-submit">Hoàn thành</button>
            </div>
        </form>
    </section>
@endsection
