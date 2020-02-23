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
                    <form action="{{route('users.index')}}" method="GET">
                        <div class="selectBoxDash">
                            <span>Sort By : </span>
                            <select name="sort" id="sort" class="form-control">
                                <option value="created_at-desc" {{ $sort == 'created_at-desc' ? 'selected' : '' }}>Created at latest</option>
                                <option value="created_at-asc" {{ $sort == 'created_at-asc' ? 'selected' : '' }}>Created at oldest</option>
                                <option value="updated_at-desc" {{ $sort == 'updated_at-desc' ? 'selected' : '' }}>Updated at latest</option>
                                <option value="updated_at-asc" {{ $sort == 'updated_at-asc' ? 'selected' : '' }}>Updated at oldest</option>
                                <option value="name-desc" {{ $sort == 'name-desc' ? 'selected' : '' }}>Name z to a</option>
                                <option value="name-asc" {{ $sort == 'name-asc' ? 'selected' : '' }}>Name a to z</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="s">Search</label>
                                <input type="text" name="s" id="s" class="form-control" value="{{$s}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default" style="margin-top: 25px">Search</button>
                    </form>
                </div>
                <div class="col-lg-12">
                    <div class="dashTable">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">S.No. </th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email Id</th>
                                    <th scope="col">Phone No.</th>
                                    <th scope="col">type</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index=>$user)
                                    <tr>
                                        <td><input type="checkbox" class="selectData"> </td>
                                        <th scope="row">{{++$index}}</th>
                                        <td><a href="{{route('users.show',$user->slug)}} ">{{$user->name}}</a> </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->type}}</td>
                                        <td>{{$user->status}}</td>
                                        <td><a href="{{route('users.edit',$user->slug)}}"><i class="fa fa-pen"></i></a><a href="#" class="ml-3" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash-alt"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboardWarning">
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="hireMeGrp">
                                <div class="hireMeInner">
                                    <span class="fa fa-times close" data-dismiss="modal" aria-label="Close"></span>
                                    <h3>Are you sure want to delete it ?</h3>
                                    <button class="btn btn-hireMeWarn">Yes</button><button class="btn btn-hireMeInfo" data-dismiss="modal" >No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection