@extends('masterauth')
@section('content')
    <body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Gudang</b>HP</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="../../index3.html" method="post">
            <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <!-- /.col -->
            <div class="social-auth-links text-center mb-3">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->
        <p class="mb-0">
            <a href="/register" class="text-center">Register</a>
        </p>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->
@endsection