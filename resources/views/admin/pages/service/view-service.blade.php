@extends('layouts.app')
@section('title')
   Service view
@endsection 
@section('content')
<div class="content">
  <div class="row"> 
  <div class="col-lg-12">
   <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
       <h4>View Service</h4>
       <a href="{{ route('services') }}" class="btn btn-success"> <i class="fa  fa-arrow-left "></i> Back</a>
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered"> 
                <tbody>
                    <tr>
                        <td>Service title</td>
                        <td>:</td>
                        <td>{{ $view->title }}</td>
                    </tr>
                    <tr>
                        <td>Service Category</td>
                        <td>:</td>
                        <td>{{ $view->category->cate_name }}</td>
                    </tr>
                    <tr>
                        <td>Service Image</td>
                        <td>:</td>
                        <td><img src="{{ asset('storage'. $view->image) }}" width="200" alt="service-image"></td>
                    </tr>
                    <tr>
                        <td>Service details</td>
                        <td>:</td>
                       <td>{!! $view->details !!}</td>
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>
   <div class="card">
    <div class="card-header">
       <h4>Service Feature</h4>
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered"> 
                <tbody>
                @php
                    $features = json_decode($view->datas); 
                @endphp
                    @foreach($features as $key =>  $datas)
                        @foreach($datas as $key => $data) 
                            <tr>
                                <td>{{ $key }}</td>
                                <td>:</td>
                                <td>{{ $data }}</td>
                            </tr> 
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
   <div class="card">
    <div class="card-header">
       <h4>Service include</h4>
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered"> 
                <tbody> 
                    @foreach($view->serviceInclude as  $data) 
                        <tr>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->price }}</td>
                        </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div> 
    </div>
   <div class="card">
    <div class="card-header">
       <h4>Service material cost</h4>
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered"> 
                <tbody>
               @foreach($view->serviceCost as  $data) 
                        <tr>
                            <td>{{ $data->title }}</td> 
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
    <div class="card">
    <div class="card-header">
       <h4>Service Question</h4>
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered"> 
                <tbody> 
                    @foreach($view->serviceQuestion as  $data) 
                        <tr>
                            <td><strong>Qusetion: </strong> {{ $data->title }}</td> 
                            <td><strong>Price: </strong>  {{ $data->price }}</td>
                        </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div> 
    </div>
  </div>
  </div>
</div>
@endsection 