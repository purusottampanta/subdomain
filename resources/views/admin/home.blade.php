@extends('admin.dashboard-layout')

@section('title')
    Home
@endsection

@section('content')
    <div class="col-lg-10 dashSpaceContain">
        <div class="dashContain">
            <h1>Dashboard</h1>
            <div class="row">
                <div class="col-lg-3">
                    <div class="iconsGrp">
                        <div class="iconsInner">
                            <div class="row">
                                <div class="col-4">
                                    <div class="iconsBack">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="iconsInfo">
                                        <h6>Total Users</h6>
                                        <p>{{count($users)}} Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="iconsGrp">
                        <div class="iconsInner">
                            <div class="row">
                                <div class="col-4">
                                    <div class="iconsBack verifyUser">
                                        <i class="fa fa-user-check"></i>

                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="iconsInfo">
                                        <h6>Verified Users</h6>
                                        <p>{{count($users->where('status','verified'))}} Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="iconsGrp">
                        <div class="iconsInner">
                            <div class="row">
                                <div class="col-4">
                                    <div class="iconsBack pendingUsers">
                                        <i class="fa fa-user-cog"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="iconsInfo">
                                        <h6>Pending Users</h6>
                                        <p>{{count($users->where('status','pending'))}} Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="iconsGrp">
                        <div class="iconsInner">
                            <div class="row">
                                <div class="col-4">
                                    <div class="iconsBack unverifyUsers">
                                        <i class="fa fa-user-times"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="iconsInfo">
                                        <h6>Unverified Users</h6>
                                        <p>{{count($users->where('status','unverified'))}} Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                    <div class="selectBoxDash">
                        <span>Sort by</span>
                        <select class="form-control">         
                            <option class="1" value="New User">New Users</option>
                            <option class="1" value="New User">New Users</option>
                            <option class="1" value="New User">New Users</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="dashTable">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">S.No. </th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Joined Date</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index=>$user)
                                    <tr>
                                        <td><input type="checkbox" class="selectData"> </td>
                                        <th scope="row">{{++ $index}}</th>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->profile? $user->profile->profession:'--'}}</td>
                                        <td>{{$user->created_at? :'starting'}}</td>
                                        <td>{{$user->status}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
