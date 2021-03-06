<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('/css/bootstrap-4.min.css') }}">
  <!-- pace-progress -->
  <link rel="stylesheet" href="{{ asset('/css/pace-theme-minimal.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/css/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
@yield('content')

<!-- jQuery -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<!-- pace-progress -->
<script src="{{ asset('/js/pace.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('/js/sweetalert2.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/adminlte.min.js') }}"></script>
@yield('pagescript')
</body>
</html>
