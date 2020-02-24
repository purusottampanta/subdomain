<?php

namespace App\Http\Controllers\A;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\UserRepository;

class HomeController extends Controller
{
    function __construct(UserRepository $userRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (authUser()->type=='system') {
            $users = $this->userRepo->paginate(null,20);
            return view('home',compact('users'));
        }
        else {
            return view('welcome');
        }
    }
}
