<div id="evaluation-form-{{ $data->id }}" class="form evalution-form">
    <x-alert-errors />
    <div class="form__header-title">
        <h3>Đánh giá khách sạn {{ $data->name }}</h3>
    </div>
    <div class="form__body-content">
        <form action="{{ route('hotel.eval', ['hotel_id' => $data->id]) }}" method="post">
            @csrf
            <div class="message-evaluation">
                <p>Hãy đánh giá để giúp {{ $data->name }} Để có thể phục vụ bạn tốt hơn ở những
                    lần sau nhé!</p>
            </div>
            <div class="quality-evaluation">
                <div>Bạn có hài lòng với chất lượng của {{ $data->name }} ?</div>
                <div>
                    <input type="radio" name="quality_input" id="bad-quality" value="-3">
                    <label for="bad-quality">Không hài lòng</label>
                </div>
                <div>
                    <input type="radio" name="quality_input" id="medium-quality" value="5">
                    <label for="medium-quality">Khá hài lòng</label>
                </div>
                <div>
                    <input type="radio" name="quality_input" id="good-quality" value="10">
                    <label for="good-quality">Rất hài lòng</label>
                </div>
            </div>
            <div class="feedback-evaluation">
                <label for="feedback_input">Góp ý</label>
                <textarea name="feedback_input" id="feedback_input" cols="30" rows="10" placeholder="Your feedback..."></textarea>
            </div>
            <button class="btn-submit">Gửi phản hồi</button>
        </form>
    </div>
</div>
