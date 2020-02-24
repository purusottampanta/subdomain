<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $users = $this->userRepo->paginate(null,20);
        return view('home',compact('users'));
        return view('admin.home');
    }
}
