<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
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
    public function create(Request $request)
    {
        return view('auth.send-code-reset-mail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForgotPasswordRequest $request)
    {
        //
        $user = User::where('email', $request->email)->first();
        $ott = strval(rand(100000, 999999)); // one time token
        if ($user) {
            PasswordReset::updateOrCreate(
                ['email' => $user->email],
                ['email' => $user->email, 'token' => $ott, 'expired_at' => Carbon::now()->addMinutes(15)]
            );
            Mail::to($user)->send(new ResetPasswordMail($user->username, $ott, $user->email));
            return redirect()->back()->with('success', "Mã xác minh đã được gửi đến mail của bạn");
        }
        return redirect()->back()->with('error', "Email không tồn tại trong hệ thống");
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
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
