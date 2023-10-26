<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | {{env('APP_NAME')}}</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{url('/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{url('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{url('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{url('css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}">
<!--===============================================================================================-->
  @if(Auth::user())
    <script>window.location='/';</script>
  @endif
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('/images/bg-01.jpg');">
      <div class="wrap-login100 p-t-30 p-b-50">
        <h2 class="text-center"><a href="/">{{env('APP_NAME')}}</a></h2>
        <span class="login100-form-title p-b-41">
          Admin Login
        </span>
       @if ($message = Session::get('error'))
       <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
       </div>
       @endif

       @if (count($errors) > 0)
        <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
         @endforeach
         </ul>
        </div>
       @endif
        <form method="POST" action="{{ route('login') }}" class="login100-form validate-form p-b-33 p-t-5">
          {{ csrf_field() }}
          <div class="wrap-input100 validate-input" data-validate = "Enter email">
            <input class="input100" type="text" name="email" placeholder="Email" pattern=".+@gmail\.com" required>
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn">
              Login
            </button>
          </div>
          <h2 class="text-center"><a href="/">Back to Home</a></h2>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="{{url('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{url('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{url('js/main.js')}}"></script>

</body>
</html>