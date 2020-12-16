@extends('layouts.app')
@section('title')
    password reset
@endsection
@section('content')
  <section class="user-area-style" style="padding: 150px 0px 50px;">
        <section class="user-area-style recover-password-area">
            <div class="container">
                <div class="contact-form-action recover">
                    <div class="form-heading text-center">
                        <h3 class="form-title">Reset Password!</h3>
                        <p class="reset-desc">Enter the Number of your account to reset the password.</a>
                        </p>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                    @endif
                    <form method="post" action="{{ route('reset-password-post') }}">
                    @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control @error('phone') is-invalid @enderror" required type="string"  name="phone" placeholder="Enter Number">
                                     @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <a class="now-log-in font-q" href="{{ route('login') }}">Log In in your account</a>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <p class="now-register">
                                    Not a member?
                                    <a class="font-q" href="{{ route('register') }}">Registration</a>
                                </p>
                            </div>

                            <div class="col-12">
                                <button class="default-btn btn-two" type="submit">
									Reset Password
								</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection
