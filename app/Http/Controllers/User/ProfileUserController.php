<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUserRequest;
use App\Models\Avatar;
use App\Models\ProfileUser;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function index()
    {
        $user = User::with(['userInfo', 'avatar'])->where('id', Auth::user()->id)->first();
        $avatar = $user->avatar ? $user->avatar->name . '.' . $user->avatar->extension : 'not_upload';
        return view('auth.account-settings', ['dataUser' => $user, 'avatar' => $avatar]);
    }

    public function edit(User $user)
    {
        $this->authorize('view', $user);
        $user->load(['userInfo', 'avatar'])->first();
        $avatar = $user->avatar ? $user->avatar->name . '.' . $user->avatar->extension : 'not_upload';
        return view('auth.personal-info', ['dataUser' => $user, 'avatar' => $avatar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileUser  $profileUser
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $res = UserInfo::updateOrCreate(['user_id' => $user->id], [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'dob' => $request->dob,
            'address' => $request->address
        ]);
        $user->update(['email' => $request->email]);
        $fileAvatar = $request->file('avatar');
        if ($fileAvatar) {
            $fileAvatarName = implode('', array($request->first_name, $request->last_name)) . '.' . $fileAvatar->getClientOriginalExtension();
            Avatar::updateOrCreate(['name' => $request->first_name . '' . $request->last_name], [
                'user_id' => $user->id,
                'path' => 'uploads/avatar',
                'name' => $request->first_name . '' . $request->last_name,
                'extension' => $fileAvatar->getClientOriginalExtension()
            ]);
            $path = $fileAvatar->move('uploads/avatar', $fileAvatarName);
        }
        if ($res) {
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        }
        return redirect()->back()->with('error', 'Cập nhật thông tin thất bại');
    }
}
