<div class="detailed-description" id="infor-{{ $data->id }}">
    <div class="detailed-description-title">
        <span class="title">Thông tin chi tiết</span>
        <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="icon-close"
            viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <style>
                svg {
                    fill: #000000
                }
            </style>
            <path
                d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
        </svg>
    </div>
    <div class="swiper">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="{{ asset($data->hotel->image1) }}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset($data->hotel->image2) }}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset($data->hotel->image3) }}" alt="">
            </div>
            ...
        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <div class="description-infor">
        <div class="info">
            <div class="info-name">
                <p class="text"><span>Hotel name: </span> {{ $data->hotel->name }} </p>
            </div>
            <div class="info-city">
                <p class="text"><span>Address: </span> {{ $data->hotel->city }}, {{ $data->hotel->country }}</p>
            </div>
            <div class="info-name">
                <p class="text"><span>Your check-in date: </span> {{ $data->check_in }} </p>
            </div>
            <div class="info-name">
                <p class="text"><span>Your check-out date: </span> {{ $data->check_out }}
                </p>
            </div>
            <div class="info-guests">
                <p class="text"><span>Quantity guest: </span> {{ $data->num_people }}
                </p>
            </div>
            <div class="info-guests">
                <p class="text"><span>Total cost: </span> {{ $data->total_cost }} <span>$</span>
                </p>
            </div>
        </div>
        <div class="description-content">
            <p class="text"><span>Description: </span> {{ $data->hotel->description }} </p>
        </div>
    </div>
</div>
