@extends('admin.layouts.app')
@section('title')
   Page view
@endsection 
@section('content')
<div class="content">
  <div class="row"> 
  <div class="col-lg-12">
   <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
       <h4>View page</h4>
       <a href="{{ route('pages') }}" class="btn btn-success"> <i class="fa  fa-arrow-left "></i> Back</a>
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered"> 
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td>:</td>
                        <td>{{ $view->title }}</td>
                    </tr> 
                    <tr>
                        <td>Slug</td>
                        <td>:</td>
                        <td>{{ $view->slug }}</td>
                    </tr> 
                    <tr>
                        <td>Type</td>
                        <td>:</td>
                        <td>{{ $view->type }}</td>
                    </tr>  
                    <tr>
                        <td>Content</td>
                        <td>:</td>
                       <td>{!! $view->content !!}</td>
                    </tr>
                    <tr>
                        <td>Keywords</td>
                        <td>:</td>
                       <td>{{  $view->keyword  }}</td>
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