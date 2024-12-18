@extends('layout.owner')

@section('content')
    <x-alert-errors />
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
            <h3>Chỉnh sửa thông tin khách sạn</h3>
            @isset($hotelInfo)
                <form action="{{ route('hotel.update', ['hotel' => $hotelInfo->id]) }}" method="POST"
                    enctype="multipart/form-data">
                @endisset
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="name">Tên khách sạn</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $hotelInfo->name }}">
                </div>

                <div class="form-group">
                    <label for="city">Thành phố</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ $hotelInfo->city }}">
                </div>

                <div class="form-group">
                    <label for="country">Quốc gia</label>
                    <input type="text" name="country" id="country" class="form-control"
                        value="{{ $hotelInfo->country }}">
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ $hotelInfo->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="check_in_date">Ngày check-in</label>
                    <input type="date" name="check_in_date" id="check_in_date" class="form-control"
                        value="{{ $hotelInfo->check_in_date }}">
                </div>

                <div class="form-group">
                    <label for="price">Giá tiền</label>
                    <input type="text" name="price" id="price" class="form-control"
                        value="{{ $hotelInfo->price }}">
                </div>

                <div class="form-group">
                    <label for="num_guest">Số lượng khách tối đa</label>
                    <input type="text" name="num_guest" id="num_guest" class="form-control"
                        value="{{ $hotelInfo->num_guest }}">
                </div>

                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" name="image[]" value="{{ $hotelInfo->image1 }}" class="form-control">
                    <input type="file" name="image[]" value="{{ $hotelInfo->image2 }}" class="form-control">
                    <input type="file" name="image[]" value="{{ $hotelInfo->image3 }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-submit">Lưu thay đổi</button>
            </form>
        </div>
    </div>
@endsection
