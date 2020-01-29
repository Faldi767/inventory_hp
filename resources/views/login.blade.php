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
            <p class="login-box-msg">Sign in</p>

            <form method="post" action="/login/store" id="tambah">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password">
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
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->
@endsection
@section('pagescript')
<!-- page script -->
<script type="text/javascript">
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
  });
  @if ($message = Session::get('error'))
  Toast.fire({
      type: 'error',
      title: '{{ $message }}'
  })
  @endif
  @if ($message = Session::get('success'))
  Toast.fire({
      type: 'success',
      title: '{{ $message }}'
  })
  @endif
</script>
@endsection