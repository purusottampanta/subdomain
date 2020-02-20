@extends('layouts.dashboard-layout')

@section('title')
    Users
@endsection

@section('content')
    <div class="col-lg-10 dashSpaceContain">
        <div class="dashContain">
            <h1>User Details</h1>
            <div class="row">
                <div class="col-lg-4">
                    <div class="userDetailBack">
                        <div class="userDetDashImg">
                            <img src="{{ $user->present()->profilePicture }}">
                        </div>
                        <p><strong>Name : </strong>{{$user->name}} </p>
                        <p><strong>Phone : </strong>{{$user->phone}}</p>
                        <p><strong>Email : </strong>{{$user->email}}</p>
                        <p><strong>User Type : </strong>{{$user->type}}</p>
                        <p><strong>Status : </strong>{{$user->status}}</p>
                        <p><strong>Joined Date : </strong>{{$user->created_at? :'starting'}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection