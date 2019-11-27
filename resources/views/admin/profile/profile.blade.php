@extends('admin.master')
@section('page_title','Profile')
@section('icon_name','pe-7s-unlock')
@section('page_heading','Update Profile')
@section('button_name','Update')
@section('icon_name',' pe-7s-id')
@section('content')
    <div class="main-card mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title">
                    <i class="header-icon metismenu-icon @yield('icon_name') icon-gradient bg-plum-plate"> </i>
                    @yield('page_heading')
                </div>
                <ul class="nav">
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-0" class="active nav-link ">Personal Profile</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg5-1" class="nav-link {{$errors->has('city_name[]') || $errors->has('country_name[]') || $errors->has('area_name[]') ? ' is-invalid-navlink' : ''}}">Address Book</a></li>
                </ul>
            </div>
            {!! Form::open(['url' => 'caravan-base/update-profile', 'method' => 'post',"enctype" => "multipart/form-data"])  !!}
            <div class="card-body">
                @include('admin.profile.change_user_profile_form')
            </div>
            <div class="d-block card-footer">
                <button onclick="location.href='{{ url("/") }}'" type="button"  class="btn btn-primary btn-wide">Back</button>
                <button type="submit" class="btn btn-secondary btn-wide pull-right">@yield('button_name')</button>
            </div>
        {!! Form::close() !!}
    </div>
@endsection