@extends('layout.app')

@section('title', 'Account settings')

@section('content')
    <section class="profile-content grid">
        <div class="wrapper">
            <div class="title">
                <div class="title-account">Quản lý tài khoản</div>
                <p class="title-info">
                    <span class="fullname">{{ $dataUser->username }}</span>
                    <span class="email">
                        @if ($dataUser->email)
                            - {{ $dataUser->email }}
                        @endif
                    </span>
                </p>
            </div>

            <ul class="settings">
                <li class="settings-item">
                    <a href="{{ route('profile.edit', ['user' => $dataUser]) }}" class="settings-item-link">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px"
                                viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                            </svg>
                        </div>
                        <div class="link-content">
                            <h3>Thông tin cá nhân</h3>
                            <p>Cung cấp thông tin cá nhân và cách chúng tôi có thể liên hệ với bạn</p>
                        </div>

                    </a>
                </li>
                <li class="settings-item">
                    <a href="{{ route('password.edit', ['user' => $dataUser]) }}" class="settings-item-link">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M256 0c4.6 0 9.2 1 13.4 2.9L457.7 82.8c22 9.3 38.4 31 38.3 57.2c-.5 99.2-41.3 280.7-213.6 363.2c-16.7 8-36.1 8-52.8 0C57.3 420.7 16.5 239.2 16 140c-.1-26.2 16.3-47.9 38.3-57.2L242.7 2.9C246.8 1 251.4 0 256 0z" />
                            </svg>
                        </div>
                        <div class="link-content">
                            <h3>Đổi mật khẩu</h3>
                            <p>Cập nhật mật khẩu để bảo mật tài khoản của bạn</p>
                        </div>

                    </a>
                </li>
                <li class="settings-item">
                    <a href="{{ route('booking.index') }}" class="settings-item-link">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z" />
                            </svg>
                        </div>
                        <div class="link-content">
                            <h3>Quản lý đặt phòng</h3>
                            <p>Xem lại các yêu cầu đặt phòng của bạn</p>
                        </div>

                    </a>
                </li>
            </ul>
        </div>
    </section>
@endsection
