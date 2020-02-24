@extends('admin.dashboard-layout')

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
                        <form action="{{route('users.update',$user->id)}} " method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" name="email" disabled>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}" name="phone" disabled>
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
                                            <option value="{{ $key }}" {{ $key == $user->type ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                            <option value="{{ $key }}" {{ $key == $user->status ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <div class="dashButtton">
                                        <button class="btn btn-hireMeBtn">Save Changes</button>
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