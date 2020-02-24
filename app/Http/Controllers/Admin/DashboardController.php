<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepository;


class DashboardController extends Controller
{

	function __construct(UserRepository $userRepo)
	{
	    $this->middleware('auth');
	    $this->userRepo = $userRepo;
	}

    public function dashboard(Request $request)
    {
        $users = $this->userRepo->paginate(null,20);

        return view('admin.home', compact('users'));
    }
}
