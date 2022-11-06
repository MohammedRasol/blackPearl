 @extends('layouts.adminPanel')
@section('title')
    Cards
@endsection

@section('content')
  <!-- Main Section-->
  <section class="d-flex justify-content-center align-items-start vh-100 py-5 px-3 px-md-0">

    <!-- Login Form-->
    <div class="d-flex flex-column w-100 align-items-center">

      <!-- Logo-->
      <a href="./index.html" class="d-table mt-5 mb-4 mx-auto">
        <div class="d-flex align-items-center">
            <svg class="f-w-5 me-2 text-primary d-flex align-self-center lh-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 203.58 182"><path d="M101.66,41.34C94.54,58.53,88.89,72.13,84,83.78A21.2,21.2,0,0,1,69.76,96.41,94.86,94.86,0,0,0,26.61,122.3L81.12,0h41.6l55.07,123.15c-12-12.59-26.38-21.88-44.25-26.81a21.22,21.22,0,0,1-14.35-12.69c-4.71-11.35-10.3-24.86-17.53-42.31Z" fill="currentColor" fill-rule="evenodd" fill-opacity="0.5"/><path d="M0,182H29.76a21.3,21.3,0,0,0,18.56-10.33,63.27,63.27,0,0,1,106.94,0A21.3,21.3,0,0,0,173.82,182h29.76c-22.66-50.84-49.5-80.34-101.79-80.34S22.66,131.16,0,182Z" fill="currentColor" fill-rule="evenodd"/></svg>
            <span class="fw-black text-uppercase tracking-wide fs-6 lh-1">Apollo</span>
        </div>      </a>
      <!-- Logo-->

      <div class="shadow-lg rounded p-4 p-sm-5 bg-white form mb-4">
        <h3 class="fw-bold mb-3">Register</h3>
        <a href="#" class="btn btn-facebook d-block mb-2"><i class="ri-facebook-circle-fill align-bottom"></i> Login
          with Facebook</a>
        <a href="#" class="btn btn-twitter d-block mb-2"><i class="ri-twitter-fill align-bottom"></i> Login with
          Twitter</a>
        <span class="text-muted text-center d-block fw-bolder my-4">OR</span>

        <!-- Register Form-->
        <form class="mt-4">
          <div class="form-group">
            <label class="form-label" for="register-fname">First name</label>
            <input type="text" class="form-control" id="register-fname" placeholder="Enter your first name">
          </div>
          <div class="form-group">
            <label class="form-label" for="register-lname">Last name</label>
            <input type="text" class="form-control" id="register-lname" placeholder="Enter your last name">
          </div>
          <div class="form-group">
            <label class="form-label" for="register-email">Email address</label>
            <input type="email" class="form-control" id="register-email" placeholder="name@email.com">
          </div>
          <div class="form-group">
            <label class="form-label" for="register-password">Password</label>
            <input type="password" class="form-control" id="register-password" placeholder="Enter your password">
          </div>
          <button type="submit" class="btn btn-primary d-block w-100 my-4">Sign Up</button>
        </form>
        <!-- / Register Form-->

        <p class="d-block text-center text-muted small">Already registered? <a
            class="text-muted text-decoration-underline" href="./login.html">Login here.</a></p>
      </div>
    </div>
    <!-- / Login Form-->

  </section>
  <!-- / Main Section-->
 @endsection
 