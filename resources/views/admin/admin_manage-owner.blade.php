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
            <h3>Danh sách tài khoản chủ khách sạn</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tài khoản</th>
                        <th>Email</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ownerList as $owner)
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->username }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->created_at }}</td>
                            <td>
                                <a href="{{ route('admin_owner.edit', ['user' => $owner->id]) }}"
                                    class="btn btn-edit">Sửa</a>
                                <form action="{{ route('admin_owner.delete', ['user' => $owner->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ownerList->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection
