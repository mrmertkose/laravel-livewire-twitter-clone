<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($slug)
    {
        $user = User::where('username', $slug)->FirstOrFail();
        return view('profile',compact('user'));
    }
}
