@extends('admin.layouts.app')
@section('title')
   User view
@endsection 
@section('content')
<div class="content">
  <div class="row"> 
  <div class="col-lg-12">
   <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
       <h4>View page</h4>
       <a href="{{ route('users') }}" class="btn btn-success"> <i class="fa  fa-arrow-left "></i> Back</a>
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered"> 
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{ $view->first_name }} {{ $view->user_name }}</td>
                    </tr> 
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $view->email }}</td>
                    </tr> 
                    <tr>
                        <td>Phone </td>
                        <td>:</td>
                        <td>{{ $view->phone  }}</td>
                    </tr>  
                    <tr>
                        <td>School Name</td>
                        <td>:</td>
                       <td>{!! $view->school_name !!}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>:</td>
                       <td>{{  $view->city  }}</td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td>:</td>
                       <td>{{  $view->state  }}</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>:</td>
                       <td>{{  $view->country  }}</td>
                    </tr>
                    <tr>
                        <td>Teacher name</td>
                        <td>:</td>
                       <td>{{  $view->teacher_name  }}</td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td>:</td>
                       <td>
                        @if($view->photo == null)
                           Image not found
                        @else
                            <img class="rounded-circle" width="250" src="{{ url('storage'. $view->photo) }}" alt="User Avatar"> 
                        @endif
                       </td>
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>
    
  </div>
  </div>
</div>
@endsection 
@push('script')   
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
@endpush