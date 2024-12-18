@extends('layout.app')

@section('content')
    <div class="container grid">
        <x-alert-errors />
        <div id="booking-form">
            <form id="bookingForm" method="POST" action="{{ route('booking.store') }}">
                @csrf
                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                <label for="check_in_date">Ngày nhận phòng:</label>
                <input type="datetime-local" name="check_in_date" required>

                <label for="check_out_date">Ngày trả phòng:</label>
                <input type="datetime-local" name="check_out_date" required>

                <label for="num_guests">Người lớn (giới hạn: {{ $hotel->num_guest }} người)</label>
                <input type="number" name="num_guests" required max="{{ $hotel->num_guest }}">

                <label for="num_children">Trẻ em (giới hạn: 5 người)</label>
                <input type="number" name="num_children">

                <label for="total_cost">Giá thuê phòng ($):</label>
                <input type="text" name="total_cost" readonly>

                <label for="payment_type">Hình thức thanh toán:</label>
                <select id="paymentType" name="payment_type" required>
                    <option value="full">Chuyển khoản toàn bộ</option>
                    <option value="deposit">Chuyển khoản cọc 40%</option>
                </select>

                    <label for="payment_method">Phương thức thanh toán:</label>
                    <select id="paymentMethod" name="payment_method">
                        <option value="">Chọn phương thức thanh toán</option>
                        <option value="Google Pay">Google Pay</option>
                        <option value="VNPay">VNPay</option>
                        <option value="Visa">Visa</option>
                        <option value="PayPal">PayPal</option>
                    </select>

                <span id="error-message" class="error-message"></span>

                <button type="button" id="openPaymentModal">Đặt phòng</button>
            </form>
        </div>

        <!-- Payment Modal -->
        <div id="paymentModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>VUI LÒNG THANH TOÁN</h2>
                <p>Giá thuê: $<span id="modalTotalCost"></span></p>
                <p id="paymentTypeText"></p>
                
                <div id="qrCodeContainer" style="display: none;">
                    <img id="qrCodeImage" src="" alt="QR Code">
                </div>
                <button type="button" id="confirmPayment">Thanh toán</button>
            </div>
        </div>

        <script>
            var pricePerNight = {{ $hotel->price }};
            var numGuestsLimit = {{ $hotel->num_guest }};
        </script>
        <script src="{{ asset('js/booking.js') }}"></script>
    </div>
@endsection
