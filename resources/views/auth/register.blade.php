@extends('layouts.registration')

@section('title')
    Signup
@endsection
@section('content')
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="/register">
                            @csrf
                            <div class="form-group ">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"
                                    value="{{ old('name') }}" label-name="name" class="input" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"
                                    value="{{ old('email') }}" label-name="email" class="input" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    value="{{ old('password') }}" label-name="password" class="input"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    value="{{ old('password_confirmation') }}" label-name="password confirmation"
                                    class="input" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" label-name="agree-term" id="agree-term" class="input"
                                    required="required"  class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="button" name="signup" id="signup" class="form-submit" value="Register"
                                    onclick="validateRegistrationForm(1)" />
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger error-div">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>* {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="alert alert-danger error-div" style="display: none">
                                <ul class="list-unstyled">
                                </ul>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('img/login/signup-image.jpg') }}" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
                <div>
                </div>
        </section>
    @endsection
