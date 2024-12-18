@extends('layout.app')

@section('content')
    <div class="wrapper container">
        <section id="form-update">
            <x-alert-errors />
            <form action="{{ route('forgot.store') }}" method="POST" id="form">
                @csrf
                <h3 class="form-title">Quên mật khẩu</h3>
                <x-alert-errors />
                <div class="form-text">
                    <p>Nhập địa chỉ email được liên kết với tài khoản của bạn</p>
                </div>
                <div class="form-input">
                    <label for="email" class="d-block">Email của bạn</label>
                    <input type="email" class="form-control w-100" name="email" id="email" placeholder="Nhập email">
                </div>
                <div class="form-btn">
                    <button class="button-submit">Gửi mã</button>
                </div>
                <div class="redirect-to-signup">
                    <p class="form-text">Bạn chưa có tài khoản? <a href="#">Đăng ký ngay</a></p>
                </div>
            </form>
        </section>
    </div>
@endsection
