<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penelitian Oh Yeah</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('registration/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('registration/vendor/nouislider/nouislider.min.css')}}">
    <link rel="stylesheet" href="{{asset('registration/css/yobri.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('registration/css/style.css')}}">

    <!-- custom css by yobri -->
    <link rel="stylesheet" href="{{asset('registration/css/yobri-responsive.css')}}">

</head>
<body>
    <input type="hidden" name="data_token" value="{{ @csrf_token() }}">
    <div class="main">

        <div class="container">
           @yield('content')
        </div>

    </div>

    <!-- JS -->
    <script src="{{asset('registration/vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{asset('registration/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('registration/vendor/wnumb/wNumb.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{asset('registration/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('registration/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{asset('registration/js/main.js')}}"></script>
    <script src="{{asset('validation/validation.js')}}"></script>
    <script src="{{asset('token.js')}}"></script>
    @yield('custom-script')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>