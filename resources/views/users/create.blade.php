@extends('layouts.dashboard-layout')

@section('title')
    Users
@endsection

@section('content')
    <div class="col-lg-10 dashSpaceContain">
        <div class="dashContain">
            <h1>Users</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="editForm">
                        <form action="{{route('users.store')}} " method="POST" id="createUserForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Full Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" required autofocus placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Email Address</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" required placeholder="Enter email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number</label>
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" name="phone" required placeholder="Enter phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>User Types</label>
                                    <select
                                        class="form-control @error('type') is-invalid @enderror"
                                        id="type"
                                        data-placeholder="select user type"
                                        name="type"
                                        required>
                                        @foreach(getUserTypes() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Enter password">
                                </div>
                                <div class="col-lg-6">
                                    <label>Status</label>
                                    <select
                                        class="form-control @error('status') is-invalid @enderror"
                                        id="status"
                                        data-placeholder="select user status"
                                        name="status"
                                        required>
                                        @foreach(getUserStatus() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="created_by" value="{{authUser()->id}}">
                                <div class="col-lg-12">
                                    <div class="dashButtton">
                                        <button class="btn btn-hireMeBtn">Save</button>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection