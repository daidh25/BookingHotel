<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OwnerPasswordController extends Controller
{
    public function edit(User $user)
    {
        return view('owner.change-password', compact('user'));
    }
}
