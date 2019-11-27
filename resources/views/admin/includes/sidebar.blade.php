<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class=""><a href="{{url('/')}}"> <img src="{{ asset('assets/images/logo.png') }}" class="logo-src-web"></a></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Menu</li>
                                <li class="{{ Request::is('caravan-base') ? 'mm-active' : '' }}">
                                    <a href="{{ url('caravan-base') }}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Dashboards
                                    </a>
                                </li>
                                <li class="{{ Request::is('caravan-base/notify') ? 'mm-active' : '' }}" style="display: none">
                                    <a href="{{ url('caravan-base/notify') }}">
                                        <i class="metismenu-icon pe-7s-bell"></i>
                                        Push Notifications
                                    </a>
                                </li>
                                <!-- Chats MANAGEMENT -->
                                <li class="app-sidebar__heading">CHAT APP</li>
                                <!-- Chats -->
                                <li>
                                    <a>
                                        <i class="metismenu-icon pe-7s-settings"></i>
                                        Chats
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li class="{{ Request::is('caravan-base/operator') ? 'mm-active' : '' }}">
                                            <a href="{{ url('caravan-base/operator') }}">
                                                <i class="metismenu-icon"></i>
                                                View All
                                            </a>
                                        </li>
                                        <li class="{{ Request::is('caravan-base/operator/create') ? 'mm-active' : '' }}">
                                            <a href="{{ url('caravan-base/operator/create') }}">
                                                <i class="metismenu-icon"></i>
                                                Send New
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>