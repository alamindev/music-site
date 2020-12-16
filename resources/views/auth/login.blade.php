@extends('layouts.app')

@section('title')
login
@endsection

@section('content')
 <section class="user-area-style" style="padding: 150px 0px 100px;">
        <div class="container">
            <div class="log-in-area" style="max-width: 700px;">
                <div class="section-title">
                    <h2>LogIn</h2>
                </div>

                <div class="contact-form-action">
                   <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group ">
                                    <label>Enter Email Address</label>
                                    <input class="form-control @error('email') is-invalid @enderror"  type="email" value="{{ old('email') }}" name="email" autocomplete="email" required autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" @error('password') is-invalid @enderror type="password" name="password"  required autocomplete="current-password">
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="login-action">
                                    <span class="log-rem">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" >Remember me!</label>
                                    </span>
                                    @if (Route::has('password.request'))
                                        <span class="forgot-login">
                                            <a href="{{ route('reset-password') }}">Forgot your password?</a>
                                        </span>
                                    @endif
                                   
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="default-btn" type="submit">
                                Log In Now
                            </button>
                            </div>

                            <div class="col-12">
                                <p>Have an account? <a href="{{ route('register') }}">Registration Now!</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
