@extends('layout.app')

@section('title', 'Personal info')

@section('content')
    <div class="wrapper container">
        <section id="form-update">
            <div class="user-info">
                <div class="form-title">
                    <h4>Thông tin cá nhân</h4>
                </div>
                <table>
                    <tr>
                        <td><strong>Họ</strong></td>
                        <td>{{ $dataUser->userInfo->first_name ?? 'Chưa có thông tin' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tên</strong></td>
                        <td>{{ $dataUser->userInfo->last_name ?? 'Chưa có thông tin' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $dataUser->email ?? 'Chưa có thông tin' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Số điện thoại</strong></td>
                        <td>{{ $dataUser->userInfo->phone_number ?? 'Chưa có thông tin' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Địa chỉ</strong></td>
                        <td>{{ $dataUser->userInfo->address ?? 'Chưa có thông tin' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ngày sinh</strong></td>
                        <td>{{ $dataUser->userInfo->dob ?? 'Chưa có thông tin' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ảnh đại diện</strong></td>
                        <td>
                            <img src="{{ asset('uploads/avatar/' . $avatar) }}" alt="Ảnh người dùng"
                                style="width: 100px; height: 100px;">
                        </td>
                    </tr>
                </table>

            </div>
            <x-alert-errors />
            <form action="{{ route('profile.update', ['user' => $dataUser]) }}" method="POST" id="form"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="user_id" id="user_id" value="{{ $dataUser->id }}">
                <div class="form-title">
                    <h4>Chỉnh sửa thông tin</h4>
                </div>
                <div class="form-content" style="display: flex; gap: 10px">
                    <div style="display: flex; flex-direction: column; gap: 20px; flex:40%">
                        <div class="form-input">
                            <label for="first_name">Họ</label>
                            <input type="text" name="first_name" id="first_name" placeholder="Firstname"
                                value="{{ $dataUser->userInfo->first_name ?? '' }}" />
                        </div>
                        <div class="form-input">
                            <label for="last_name">Tên</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Lastname"
                                value="{{ $dataUser->userInfo->last_name ?? '' }}">
                        </div>
                        <div class="form-input">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email"
                                value="{{ $dataUser->email }}">
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 20px; flex:40%">
                        <div class="form-input">
                            <label for="phone_number">Số điện thoại</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Telephone"
                                value="{{ $dataUser->userInfo->phone_number ?? '' }}">
                        </div>
                        <div class="form-input">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" placeholder="Address"
                                value="{{ $dataUser->userInfo->address ?? '' }}">
                        </div>
                        <div class="form-input">
                            <label for="dob">Ngày sinh</label>
                            <input type="date" name="dob" id="dob"
                                value="{{ $dataUser->userInfo->dob ?? '' }}">
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 20px">
                    <div class="form-input input-file">
                        <label for="avatar">Ảnh đại diện</label>
                        <input type="file" name="avatar" id="avatar">
                    </div>
                    <div class="preview-img">
                        <img src="{{ asset('uploads/avatar/' . $avatar) }}" alt="Ảnh người dùng">
                    </div>
                </div>
                <div class="form-btn">
                    <button class="button-submit">Cập nhật</button>
                </div>
            </form>
        </section>
    </div>
@endsection
