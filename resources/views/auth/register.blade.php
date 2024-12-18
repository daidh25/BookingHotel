@extends('layout.app')

@section('content')
    <div class="wrapper container">
        <section id="form-update" class="form-login">
            <x-alert-errors />
            <form action="{{ route('register.store') }}" method="POST" id="form">
                @method('POST')
                @csrf
                <div class="login-logo">
                    <img src={{ asset('assets/images/login.png') }} alt="">
                </div>
                <div class="login-body">
                    <div class="form-title">
                        <h4>Đăng ký</h4>
                    </div>
                    <div class="form-input">
                        <input type="text" name="username" id="username" placeholder="Tài khoản" />
                    </div>
                    <div class="form-input">
                        <input type="text" name="email" id="email" placeholder="Email" />
                    </div>
                    <div class="form-input">
                        <input type="password" name="password" id="password" placeholder="Mật khẩu">
                    </div>
                    <div class="form-input">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-btn">
                        <button class="button-submit">Đăng ký</button>
                    </div>
                    <div class="login-google">
                        <p><a href={{ route('login.create') }}>Đăng nhập ngay</a></p>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
