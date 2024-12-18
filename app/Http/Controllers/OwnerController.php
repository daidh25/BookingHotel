<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Avatar;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ownerList = User::withTrashed()->where('role', 'owner')->paginate(10);
        return view('admin.admin_manage-owner', compact('ownerList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_owner-hotel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * Đặt name, id input theo mẫu sau: 
     * username -> name = "username" id=....
     * password -> name="password" id=....
     * password confirm -> name="password_confirmation" id=....
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $newOwner = new User;
        $newOwner->role = 'owner';
        $newOwner->password = bcrypt($request->password);
        $newOwner->fill($request->except(['password']));
        return $newOwner->save() ? redirect()->back()->with('success', 'Tạo thành công') : redirect()->back()->with('error', 'Vui lòng thử lại sau');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $owner = $user;
        return view('admin.edit_owner-hotel', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOwnerRequest $request, User $user)
    {
        $res = $user->update(['email' => $request->email, 'username' => $request->username]);

        if ($res) {
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        }
        return redirect()->back()->with('error', 'Cập nhật thông tin thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $result = User::find($id)->forceDelete();
        return $result ? redirect()->back()->with('success', 'Xoá thành công!') : redirect()->back()->with('error', 'Xoá thất bại');
    }
}
