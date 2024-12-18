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
            <h3>Thêm thông tin khách sạn</h3>
            <form action="{{ route('hotel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Tên khách sạn</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="city">Thành phố</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
                </div>

                <div class="form-group">
                    <label for="country">Quốc gia</label>
                    <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}">
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="check_in_date">Ngày check-in</label>
                    <input type="date" name="check_in_date" id="check_in_date" class="form-control"
                        value="{{ old('check_in_date') }}">
                </div>

                <div class="form-group">
                    <label for="price">Giá tiền</label>
                    <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="num_guest">Số lượng khách tối đa</label>
                    <input type="text" name="num_guest" id="num_guest" class="form-control"
                        value="{{ old('num_guest') }}">
                </div>

                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" name="image[]" class="form-control" multiple>
                </div>

                <button type="submit" class="btn btn-submit">Thêm khách sạn</button>
            </form>
        </div>
    </div>
@endsection