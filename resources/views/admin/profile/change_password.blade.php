@extends('admin.master')
@section('page_title','Profile')
@section('icon_name','pe-7s-unlock')
@section('page_heading','Change Password')
@section('button_name','Change Password')
@section('content')

    <div class="main-card mb-3 card">
        <div class="card-header-tab card-header">
            <div class="card-header-title">
                <i class="header-icon metismenu-icon @yield('icon_name') icon-gradient bg-plum-plate"> </i>
                @yield('page_heading')
            </div>
        </div>
        {!! Form::open(['url' => 'caravan-base/change-password', 'method' => 'post'])  !!}
        <div class="card-body">
            @include('admin.profile.change_pass_form')
        </div>
        <div class="d-block card-footer">
            <button onclick="location.href='{{ url("/") }}'" type="button"  class="btn btn-primary btn-wide">Back</button>
            <button type="submit" class="btn btn-secondary btn-wide pull-right">@yield('button_name')</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection