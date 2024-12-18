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
            <h3>Danh sách tài khoản khách hàng</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listUser as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <form action="{{ route('admin_user.delete', ['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $listUser->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection
