@extends('admin.profile.template')
@section('page_heading','Push Notifications')
@section('button_name','Update')
@section('icon_name','pe-7s-bell')
@section('form')

    {!! Form::open(['url' => 'caravan-base/notify', 'method' => 'post'])  !!}
    @include('admin.profile.notify_form')
    {!! Form::close() !!}
@endsection