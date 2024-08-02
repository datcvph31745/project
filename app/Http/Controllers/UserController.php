<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use DataTables;

class UserController extends Controller
{
    public function register(){
        return view('auth.login');
    }
}