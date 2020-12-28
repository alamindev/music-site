@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
<div class="container px-3  px-md-0" style="padding: 120px 0px 70px;">
    <h1>Profile</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card"> 
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                        @if(auth()->user()->photo == null)
                            <img class="rounded-circle" src="{{ asset('assets/images/admin.jpg') }}" alt="User Avatar"> 
                        @else
                            <img class="rounded-circle" width="250" src="{{ url('storage'. auth()->user()->photo) }}" alt="User Avatar"> 
                        @endif
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Profile information</h3>
                    <a href="{{ route('profile.update') }}" class="btn btn-success">Update Profile</a>
                </div> 
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</strong></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->email }}</strong></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->phone  }}</strong></td>
                        </tr>
                        <tr>
                            <td>School name</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->school_name  }}</strong></td>
                        </tr>
                       
                        <tr>
                            <td>Teacher name</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->teacher_name  }}</strong></td>
                        </tr>
                        <tr>
                            <td>School name</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->school_name  }}</strong></td>
                        </tr>
                         <tr>
                            <td>City</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->city  }}</strong></td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->state  }}</strong></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td><strong>{{ auth()->user()->country  }}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row pt-5">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name of Exercise</th>
                        <th>Time in Minutes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sessions as $session)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($session->created_at)->format('Y-m-d') }}</td>
                            @php 
                            $exercise_id = \App\Models\Url::where('id', $session->url_id)->first()->exercise_id;

                            @endphp
                            <td>{{ \App\Models\Exercise::where('id', $exercise_id)->first()->exercise_name }}</td>
                            <td>{{ $session->minutes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $sessions->links() }}
        </div>
    </div>
</div>
@endsection
 