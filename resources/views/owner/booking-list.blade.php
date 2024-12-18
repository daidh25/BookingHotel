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
            <h3>Danh sách đơn đặt phòng</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách sạn</th>
                        <th>Người đặt</th>
                        <th>Người lớn</th>
                        <th>Trẻ em</th>
                        <th>Hình thức</th>
                        <th>Phương thức</th>
                        <th>Ngày nhận</th>
                        <th>Ngày trả</th>
                        <th>Thanh toán</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookingPendingList as $booking)
                        @if ($booking->hotel != null && $booking->accepted != 2)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($booking->hotel->name, 15, '...') }}</td>
                                <td>{{ $booking->customer->username }}</td>
                                <td>{{ $booking->num_people }}</td>
                                <td>{{ $booking->num_children }}</td>
                                <td>{{ $booking->pay_method }}</td>
                                <td>{{ $booking->payment_method }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y H:i') }}</td>
                                <td>${{ $booking->total_cost }}</td>
                                @if ($booking->accepted != 2)
                                    <td>
                                        @if ($booking->accepted == 0)
                                            <form
                                                action="{{ route('owner_manage.update', ['hotel_id' => $booking->hotel->id, 'booking_id' => $booking->id]) }}"
                                                method="POST">
                                                @method('PUT')
                                                @csrf
                                                <button type="submit" class="btn btn-accept">Đồng ý</button>
                                            </form>
                                        @elseif ($booking->accepted == 1)
                                            <form
                                                action="{{ route('owner_manage.destroy', ['hotel_id' => $booking->hotel->id, 'booking_id' => $booking->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-checkout">Trả phòng</button>
                                            </form>
                                        @endif
                                    </td>
                                @else
                                    <td>
                                        <p>Đã trả phòng</p>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
