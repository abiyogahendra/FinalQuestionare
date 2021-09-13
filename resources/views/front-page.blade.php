
@extends('master.master')

@section('content')
    <div class="signup-content">
        <div class="signup-img">
            <img src="{{asset('registration/images/form-img.jpg')}}" alt="">
            <div class="signup-img-content">
                <h2>Register now </h2>
                <p>while seats are available !</p>
            </div>
        </div>
        <div class="signup-form registration-form data-masuk">
           
        </div>
    </div>
@endsection()

@section('custom-script')
    <script src="{{asset('registration/js/inputdata.js')}}"></script>
@endsection()