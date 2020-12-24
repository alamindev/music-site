@extends('layouts.app')

@section('title')
    Registration
@endsection
@section('content')
  <section class="user-area-style" style="padding: 150px 0px 100px;">
        <div class="container">
            <div class="registration-area">
                <div class="section-title">
                    <h2>Registration</h2>
                </div>

                <div class="contact-form-action">
                     <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input id="first_name" required class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name"  value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input id="last_name" required class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name"  value="{{ old('last_name') }}">
                                     @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" required class="form-control @error('email') is-invalid @enderror" type="email" name="email"  value="{{ old('email') }}">
                                     @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input id="phone" minlength="10" maxlength="10" required class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="A 10 digit phone number required">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="school_name">School name</label>
                                    <input id="school_name" required class="form-control @error('school_name') is-invalid @enderror" type="text" name="school_name" value="{{ old('school_name') }}">
                                    @error('school_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input id="city" required class="form-control @error('city') is-invalid @enderror" type="text" name="city"  value="{{ old('city') }}">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input id="state" required class="form-control @error('state') is-invalid @enderror" type="text" name="state"  value="{{ old('state') }}">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input id="country"  required class="form-control @error('country') is-invalid @enderror" type="text" name="country"  value="{{ old('country') }}">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="teacher_name">Music Teacher Name </label>
                                     <input class="form-control" type="text" name="teacher_name" placeholder="(Optional)"  value="{{ old('teacher_name') }}"> 
                                </div>
                            </div>   
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="photo">Photo <span>(Optional)</span></label>
                                     <input class="form-control" type="file" name="photo" > 
                                </div>
                            </div>   
                         <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" required class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  
                             <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" required autocomplete="new-password" class="form-control" type="password" name="password_confirmation">
                                </div>
                            </div>  
                            <div class="col-12">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <button class="default-btn register" type="submit">
                                        Register Now
                                    </button>
                                    </div>

                                    <div class="col-lg-6 text-right">
                                        <input id="show_pass" value="show" type="checkbox">
                                        <label for="show_pass">Show password ?</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <p>Have an account? <a href="{{ route('login') }}">Login Now!</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
