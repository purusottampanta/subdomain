@extends('layouts.dashboard-layout')

@section('title')
    Settings
@endsection

@section('content')
    <div class="col-lg-10 dashSpaceContain">
        <div class="dashContain">
            <h1>Edit Settings</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="editForm">
                        <form action="{{route('settings.update',$setting->id)}} " method="post">
                        <div class="row">
                                @csrf
                                @method('PATCH')
                                <div class="col-lg-6">
                                    <label>S. No.</label>
                                    <input type="text" class="form-control" disabled value="{{$setting->id}}">
                                </div>
                                <div class="col-lg-6">
                                    <label>Setting Key</label>
                                    <input type="text" class="form-control" name="key" value="{{$setting->key}}">
                                </div>
                                <div class="col-lg-6">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="value" value="{{$setting->value}}">
                                </div>

                                <div class="col-lg-12">
                                    <div class="dashButtton">
                                        <button class="btn btn-hireMeBtn" type="submit">Save Changes</button>
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