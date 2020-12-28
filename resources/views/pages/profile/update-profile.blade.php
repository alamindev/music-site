@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
<div class="container px-3  px-md-0" style="padding: 120px 0px 70px;">
    <h1>Profile</h1>
    <form action="{{ route('profile.update.post') }}" method="post" enctype="multipart/form-data" >
     @csrf
        <div class="row">
        <div class="col-md-4">
            <div class="card"> 
                <div class="card-body">
                    <div class="">
                        <div class="form-group">
                            <label for="uplaod">Update photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>   
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Update Profile information</h3>
                    <a href="{{ route('profile') }}" class="btn btn-info">Back</a>
                </div> 
                <div class="card-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text"  id="first_name" name="first_name" class="form-control  @error('first_name') is-invalid @enderror" value="{{ auth()->user()->first_name }}">
                         @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text"  id="last_name" name="last_name" class="form-control  @error('last_name') is-invalid @enderror" value="{{ auth()->user()->last_name }}">
                         @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"  id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ auth()->user()->email }}">
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                         <input id="phone" minlength="10" maxlength="10" value="{{ auth()->user()->phone }}" required class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="A 10 digit phone number required">
                           @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="school_name">School name</label>
                        <input type="text"  id="school_name" name="school_name" class="form-control @error('school_name') is-invalid @enderror" value="{{ auth()->user()->school_name }}">
                        @error('school_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text"  id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ auth()->user()->city }}">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text"  id="state" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ auth()->user()->state }}">
                         @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text"  id="country" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ auth()->user()->country }}">
                         @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="teacher_name">Teacher name</label>
                        <input type="text"  id="teacher_name" name="teacher_name" class="form-control" value="{{ auth()->user()->teacher_name }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
