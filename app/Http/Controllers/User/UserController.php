<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUserRequest;
use App\Models\Avatar;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUser = User::withTrashed()->where('role', '!=', 'admin')->paginate(10);
        return view('admin.admin_manage-user', compact('listUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
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
        $user->load('userInfo');
        return view('admin.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUserRequest $request, User $user)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = User::find($id)->forceDelete();
        return $result ? redirect()->back()->with('success', 'Xoá thành công!') : redirect()->back()->with('error', 'Xoá thất bại');
    }
}
