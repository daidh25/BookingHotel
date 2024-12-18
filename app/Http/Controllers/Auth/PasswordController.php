<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PasswordController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        return view('auth.change-password', ['dataUser' => $user]);
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChangePasswordRequest $request, User $user)
    {
        $validPassword = Hash::check($request->current_password, $user->password);
        if ($validPassword) {
            $newPassword = $request->new_password;
            $res = $user->update(['password' => bcrypt($newPassword)]);
            if ($res) {
                return redirect()->back()->with('success', "Thay đổi mật khẩu thành công");
            } else {
                return redirect()->back()->with('error', "Thay đổi mật khẩu thất bại");
            }
        } else {
            return redirect()->back()->with('error', "Mật khẩu hiện tại không đúng");
        }
    }
}
