<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFilterRequest;
use App\Repositories\Eloquent\UserRepository;

class UsersController extends Controller
{
    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserFilterRequest $request)
    {
        $s = $request->s;
        $sort = $request->sort;
        $users = $this->userRepo->searchFilterAndPaginate($request->filters());

        return view('users.index',compact('users','s','sort'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:125',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|digits:10|unique:users',
        ]);

        $user = $this->userRepo->store($request);

        return redirect()->route('users.index')->withStatus('User Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = $this->userRepo->requiredBySlug($slug);
        
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = $this->userRepo->requiredBySlug($slug);
        
        return view('users.edit',compact('user'));
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
        $this->validate($request, [
            'name' => 'required|string|max:125',
            'profile_picture' => 'image|max:10240',
        ]);
        $user = $this->userRepo->requiredById($id);
        $user = $this->userRepo->renew($user, $request);

        return redirect()->route('users.index')->withStatus('User Updated');
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
