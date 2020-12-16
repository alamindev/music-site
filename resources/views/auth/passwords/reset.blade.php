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
                        <h3 class="form-title">Enter New Password!</h3>
                        <p class="reset-desc">Reset the password.</a>
                        </p>
                    </div>
   @if (Session::has('message'))
                        <div class="alert alert-danger">{{ Session::get('message') }}</div>
                    @endif
                    <form method="post" action="{{ route('reset') }}">
                    @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password"  required autocomplete="new-password">
                                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 @if (Session::has('phone'))
                                    <input type="hidden" name="phone" value="{{ Session::get('phone') }}">
                                @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                  <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" required class="form-control" type="password" name="password_confirmation"  required autocomplete="new-password"> 
                                </div>
                            </div>
  
                            <div class="col-12">
                                <button class="default-btn btn-two" type="submit">
									Submit
								</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
@endsection
