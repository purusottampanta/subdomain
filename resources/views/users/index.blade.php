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

                    <div class="selectBoxDash">
                        <span>Sort By : </span>
                        <select class="form-control ml-1">
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