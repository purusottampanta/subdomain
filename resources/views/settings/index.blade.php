@extends('layouts.dashboard-layout')

@section('title')
    Settings
@endsection

@section('content')
    <div class="col-lg-10 dashSpaceContain">
        <div class="dashContain">
            <h1>Settings</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="dashTable">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">S.No. </th>
                                    <th scope="col">Key</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $index=>$setting)
                                    <tr>
                                        <td><input type="checkbox" class="selectData"> </td>
                                        <th scope="row">{{++$index}}</th>
                                        <td>{{$setting->key}}</td>
                                        <td>{{$setting->value}}</td>
                                        <td><a href="{{route('settings.edit',$setting->id)}}"><i class="fa fa-pen"></i></a><a href="#" class="ml-3" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash-alt"></i></a></td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection