<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ], [
            'username.required' => 'Vui lòng nhập tài khoản',
            'username.exists' => 'Tài khoản không tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            if (auth()->user()->role === 'user') return redirect()->route('home')->with('success', 'Đăng nhập thành công');
            if (auth()->user()->role === 'admin') return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
            if (auth()->user()->role === 'owner') return redirect()->route('owner.dashboard')->with('success', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Đăng xuất thành công');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login.create')->with('error', 'Đăng nhập thất bại');
        }

        $user = User::where('email', $google->email)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        } else {
            return redirect()->route('login.create')->with('error', 'Tài khoản không tồn tại');
        }
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
