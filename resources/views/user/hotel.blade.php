@extends('layout.app')

@section('content')
    <div class="container grid ">
        <div class="info_hotel-name">
            <h2>{{ $hotel->name }}</h2>
            <h3>{{ $hotel->price }}$ / ngày</h3>
            <div class="info_hotel-tasks">
                <p>{{ $hotel->city }}, {{ $hotel->country }}</p>
                <div>
                    @auth
                        @if (count($hotel->favoriteUsers) > 0 && $hotel->favoriteUsers[0]->id === auth()->user()->id)
                            <a href="#">Đã yêu thích</a>
                        @else
                            <form action="{{ route('favorite_hotel.store', ['hotel_id' => $hotel->id]) }}" method="post">
                                @csrf
                                <button>
                                    <a>Thêm yêu thích <i class="far fa-heart"></i></a>
                                </button>
                            </form>
                        @endif
                    @endauth
                    @guest
                        <form action="{{ route('favorite_hotel.store', ['hotel_id' => $hotel->id]) }}" method="post">
                            @csrf
                            <button>
                                <a>Thêm yêu thích <i class="far fa-heart"></i></a>
                            </button>
                        </form>
                    @endguest
                    <span>Chia sẻ <i class="far fa-share-square"></i></span>
                    @if ($hotel->deleted_at == null)
                        <a href="{{ route('booking.create', ['hotel_id' => $hotel->id]) }}">Đặt thuê</a>
                    @else
                        <a href="#">Đã cho thuê</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="info_hotel-img-list">
            <div class="info_hotel-img half-left">
                <img src="/{{ $hotel->image1 }}" alt="">
            </div>
            <div class="info_hotel-img half-right">
                <img src="/{{ $hotel->image2 }}" alt="">
                <img src="/{{ $hotel->image3 }}" alt="">
            </div>
        </div>

        <div class="info_hotel-relate">
            <div class="info_hotel-service">
                <h3>Những dịch vụ tiện ích dành cho bạn</h3>
                <ul class="hotel-service-list">
                    <li class="hotel-service-item"><i class="fas fa-utensils"></i> Bếp</li>
                    <li class="hotel-service-item"><i class="fas fa-laptop"></i> Không gian riêng để làm việc</li>
                    <li class="hotel-service-item"><i class="fas fa-paw"></i> Cho phép thú cưng</li>
                    <li class="hotel-service-item"><i class="fas fa-tshirt"></i> Máy giặt</li>
                    <li class="hotel-service-item"><i class="fas fa-baby"></i> Dịch vụ văn sóc trẻ sơ sinh</li>
                    <li class="hotel-service-item"><i class="fas fa-wifi"></i> Wi-fi</li>
                    <li class="hotel-service-item"><i class="fas fa-parking"></i> Chỗ đỗ xe miễn phí tại nơi ở</li>
                    <li class="hotel-service-item"><i class="fas fa-tv"></i> TV</li>
                    <li class="hotel-service-item"><i class="fas fa-camera"></i> Camera an ninh trong nhà</li>
                    <li class="hotel-service-item"><i class="fas fa-smog"></i> Máy báo khói</li>
                </ul>
            </div>

            <div class="info_hotel-description">
                <h3>Thông tin chỗ ở</h3>
                <p>Tối đa cho {{ $hotel->num_guest }} khách</p>
                <pre>{{ $hotel->description }}</pre>
            </div>
        </div>

        <div class="info_hotel-more">
            <h3>Những điều cần biết</h3>
            <div class="hotel-description-rules">
                <h4>Nội quy nhà</h4>
                <p>Giữ gìn vệ sinh chung</p>
                <p>Không phá hoại thiết bị trong phòng</p>
                <p>Không mở tiệc quá ồn ào</p>
                <span href="#">Hiển thị thêm <i class="fas fa-angle-right"></i></span>
            </div>
            <div class="hotel-description-security">
                <h4>An toàn và chỗ ở</h4>
                <p>Chưa có thông tin về việc có máy phát hiện khí CO</p>
                <p>Chưa có thông tin về việc có máy báo khói</p>
                <p>Camera an ninh/thiết bị ghi</p>
                <span href="#">Hiển thị thêm <i class="fas fa-angle-right"></i></span>
            </div>
            <div class="hotel-description-policy">
                <h4>Chính sách</h4>
                <p>Hoàn tiền một phần: Nhận tiền hoàn lại cho tất cả các đêm cách thời điểm bạn hủy 24 giờ trở lên. Không
                    được hoàn tiền phí dịch vụ hoặc chi phí cho các đêm bạn đã ở.</p>
                <p>Hãy đọc toàn bộ chính sách hủy của Chủ nhà/Người tổ chức được áp dụng ngay cả khi bạn hủy vì ốm bệnh hoặc
                    gián đoạn do dịch COVID-19.</p>
                <span href="#">Hiển thị thêm <i class="fas fa-angle-right"></i></span>
            </div>

        </div>

    </div>
@endsection
