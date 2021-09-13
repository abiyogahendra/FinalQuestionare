<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/default/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/default/bootstrap-theme.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login/css/login/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/responsive/yobri-responsive.css')}}">
    
    <script src="https://kit.fontawesome.com/8d88473a47.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
<div class="container">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
    <div class="row main content-login  mt-mb-auto"  style="padding-top:30px; pading-bottom:auto">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-body">
					<h4 class="text-center">Diharap Login</h4>
                    <form class="form form-signup" role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fas fa-fingerprint"></i>
                            </span>
                            <input name="email" required type="text" autocomplete="off" class="form-control" placeholder="Email Unix" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fas fa-unlock-alt"></i></span>
                            <input name="password" required type="password" autocomplete="off" class="form-control" placeholder="Password" />
                        </div>
                    </div>
					</form>
					<a href="#" type="button" id="submit_button" class="btn submit-button btn-sm btn-primary btn-block btn-login" onclick="PostLogin()">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('login/js/login/post-login.js')}}"></script>
</body>
</html>