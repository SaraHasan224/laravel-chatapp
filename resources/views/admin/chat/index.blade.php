@extends('admin.master')
@section('page_title','Admin Dashboard')
@section('page_heading','Admin Dashboard')
@section('icon_name','pe-7s-rocket')
@section('content')
    <div class="app-inner-layout chat-layout">
        <div class="app-inner-layout__wrapper">
            <div class="app-inner-layout__content card">
                <div class="table-responsive">
                    <div class="app-inner-layout__top-pane">
                        <div class="pane-left">
                            <div class="mobile-app-menu-btn">
                                <button type="button" class="hamburger hamburger--elastic">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                </button>
                            </div>
                            <div class="avatar-icon-wrapper mr-2">
                                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                <div class="avatar-icon avatar-icon-xl rounded"><img width="82" src="assets/images/avatars/1.jpg" alt=""></div>
                            </div>
                            <h4 class="mb-0 text-nowrap">Chad Evans
                                <div class="opacity-7">Last Seen Online: <span class="opacity-8">10 minutes ago</span></div>
                            </h4>
                        </div>
                    </div>
                    <div class="chat-wrapper">
                        <div class="float-right">
                            <div class="chat-box-wrapper chat-box-wrapper-right">
                                <div>
                                    <div class="chat-box-event-sent-name">The master-builder of human happiness.</div>
                                    <div class="chat-box-event-sent-message">The master-builder of human happiness.</div>
                                    <small class="opacity-6">
                                        <i class="fa fa-calendar-alt mr-1"></i>
                                        11:01 AM | Yesterday
                                    </small>
                                </div>
                                <div>
                                    <div class="avatar-icon-wrapper ml-1">

                                        <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                        <div class="avatar-icon avatar-icon-lg rounded"><img
                                                    src="assets/images/avatars/3.jpg"
                                                    alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-box-wrapper">
                            <div>
                                <div class="avatar-icon-wrapper mr-1">
                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                    <div class="avatar-icon avatar-icon-lg rounded"><img src="assets/images/avatars/2.jpg" alt=""></div>
                                </div>
                            </div>
                            <div>
                                <div class="chat-box">Mistaken idea of denouncing pleasure and praising pain was born and I will give you</div>
                                <small class="opacity-6">
                                    <i class="fa fa-calendar-alt mr-1"></i>
                                    11:01 AM | Yesterday
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="app-inner-layout__bottom-pane d-block text-center">
                        <div class="mb-0 position-relative row form-group">
                            <div class="col-sm-12">
                                <input placeholder="Write here and hit enter to send..." type="text" class="form-control-lg form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-inner-layout__sidebar card">
                <div class="app-inner-layout__sidebar-header">
                    <ul class="nav flex-column">
                        <li class="nav-item-header nav-item">Friends Online</li>
                    </ul>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <button type="button" tabindex="0" class="dropdown-item">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left mr-3">
                                        <div class="avatar-icon-wrapper">
                                            <div class="badge badge-bottom badge-success badge-dot badge-dot-lg"></div>
                                            <div class="avatar-icon"><img
                                                        src="assets/images/avatars/2.jpg"
                                                        alt=""></div>
                                        </div>
                                    </div>
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Alina Mcloughlin</div>
                                        <div class="widget-subheading">Aenean vulputate eleifend tellus.</div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection