<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Caravan - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Caraven Base">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        @include('admin.auth.master')
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="text-center"><a href="{{url('/')}}"> <img src="{{ asset('assets/images/logo.png') }}" class="app-logo-login"></a></div>
                            <h4 class="mb-0">
                                <span class="d-block">Welcome back,</span>
                                <span>Please sign in to your account.</span></h4>
                            <h6 class="mt-3" style="display:none;">No account? <a href="javascript:void(0);" class="text-primary">Sign up now</a></h6>
                            <div class="divider row"></div>
                            <div>
                                <form action="{{ route('login') }}" method="POST">{!! csrf_field() !!}
                                    @if (session()->has('message'))
                                        <div class="alert alert-warning alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    @if (session()->has('errors'))
                                        <div class="alert alert-danger fade  {{ (Session::has('errors') ? 'show' : '') }}" role="alert">
                                            <b>Error(s)!</b><br>
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}  <br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Email</label>
                                                <input name="email" type="email" value="{{ old('email') }}" id="exampleEmail" placeholder="Enter Email Address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="examplePassword" class="">Password</label>
                                                <input name="password" id="password" placeholder="Enter Password" type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative form-check">
                                        <input name="remember" {{ old('remember') ? 'checked' : '' }} id="remember_me"  type="checkbox" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label" >Keep me logged in</label>
                                    </div>
                                    <div class="divider row"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
                                            <button name="submit" type="submit" class="btn btn-primary btn-lg">Log In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript" src="{{ asset('assets/scripts/admin.js') }}"></script></body>
</html>
