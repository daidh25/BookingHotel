@extends('layout.app')

@section('content')
<div class="wrapper container">
    <section id="form-update" class="form-login">
        <x-alert-errors/>
        <form action="{{ route('login.login') }}" method="POST" id="form" >
            @method('POST')
            @csrf
            <div class="login-logo">
                <img src={{ asset('assets/images/login.png') }} alt="">
            </div>
            <div class="login-body">
                <div class="form-title">
                    <h4>Đăng nhập</h4>
                </div>
                <div class="form-input">
                    <input type="text" name="username" id="username" placeholder="Tài khoản"/>
                </div>
                <div class="form-input">
                    <input type="password" name="password" id="password" placeholder="Mật khẩu">
                </div>
                <div class="form-btn">
                    <button class="button-submit">Đăng nhập</button>
                </div>
                {{-- nút quên mật khẩu --}}
                <p><a class="forgot-pass" href={{ route('forgot.create') }}>Quên mật khẩu</a></p>
                <div class="login-google">
                    <p><a href={{ route('register.create') }}>Đăng ký tài khoản</a></p>
                    <p>hoặc</p>
                    <div>
                        <a href={{ route('login.google') }}>
                            <i class="fab fa-google"></i>
                            <span>Đăng nhập bằng Google</span>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection