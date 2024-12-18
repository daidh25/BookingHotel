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

        <div class="table-admin">
            <h3>Danh sách khách sạn chưa được duyệt</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên KS</th>
                        <th>Tên chủ</th>
                        <th>Địa điểm</th>
                        <th>Ngày check in</th>
                        <th>Giá</th>
                        <th>Số lượng khách</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unapprovedHotels as $hotel)
                        <tr>
                            <td>{{ $hotel->id }}</td>
                            <td>{{ $hotel->name }}</td>
                            <td>{{ $hotel->owner->username }}</td>
                            <td>{{ $hotel->city }}, {{ $hotel->country }}</td>
                            <td>{{ $hotel->check_in_date }}</td>
                            <td>{{ $hotel->price }}</td>
                            <td>{{ $hotel->num_guest }}</td>
                            <td>
                                <form action="{{ route('admin.approve_hotel', ['hotel' => $hotel->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Duyệt</button>
                                </form>
                                <form action="{{ route('admin.delete_hotel', ['hotel' => $hotel]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary"
                                        style="background-color: red">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
