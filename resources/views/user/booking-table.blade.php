<div class="booking-table active">
    <div class="title">
        <h3 class="title">Bạn đã đặt những phòng sau</h3>
    </div>
    <table class="booking-list">
        <thead>
            <tr>
                <th>Khách sạn</th>
                <th>Địa điểm</th>
                <th>Số tiền phải trả</th>
                <th>Trạng thái</th>
                <th>Tuỳ chọn</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userBookingData as $data)
                @include('user.detail-booking', ['data' => $data])
                @if ($data->deleted_at == null)
                    <tr class="hotel current-booking" data-target="infor-{{ $data->id }}">
                        <td><a href="#">{{ $data->hotel->name }}</a></td>
                        <td><a href="#">{{ $data->hotel->city }} , {{ $data->hotel->country }}</a></td>
                        <td>
                            <p>{{ $data->total_cost }}</p>
                        </td>
                        @if ($data->accepted == 1)
                            <td>Thành công</td>
                        @else
                            <td>Đang chờ</td>
                        @endif
                        <td>
                            <div class="list-btn">
                                <button class="detail-btn" data-target="infor-{{ $data->id }}">Xem thông tin chi
                                    tiết</button>
                                <form action="{{ route('booking.destroy', ['booking_id' => $data->id]) }}"
                                    method="post">
                                    @method('delete')
                                    @csrf
                                    <button {{ $data->accepted == 0 ? '' : 'disabled' }} class='cancel-booking-btn'>Huỷ
                                        đặt phòng</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach

            @foreach ($histories as $history)
                @include('user.detail-booking', ['data' => $history])
                <tr class="hotel history-booking" data-target="infor-{{ $history->id }}">
                    <td>
                        <p>{{ $history->hotel->name }}</p>
                    </td>
                    <td>
                        <p>{{ $history->hotel->city }} - {{ $history->hotel->country }}</p>
                    </td>
                    <td>
                        <p>{{ $history->total_cost }}</p>
                    </td>
                    @if ($history->deleted_at != null && $history->accepted == 2)
                        <td>Đã trả phòng</td>
                    @endif
                    @if ($history->deleted_at == null && $history->accepted == 0)
                        <td>Đang chờ duyệt</td>
                    @endif
                    @if ($history->deleted_at == null && $history->accepted == 1)
                        <td>Đang phục vụ bạn</td>
                    @endif
                    <td>
                        <div class="list-btn">
                            <x-evalution-form :data="$history" />
                            <button class="detail-btn" data-target="infor-{{ $history->id }}">Xem thông tin chi
                                tiết</button>
                            @if ($history->deleted_at)
                                <button class='evaluation-btn' data-target="evaluation-form-{{ $history->id }}">Đánh
                                    giá
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
