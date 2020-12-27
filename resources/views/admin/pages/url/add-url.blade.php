@extends('admin.layouts.app')

@section('title')
    URL list
@endsection
@section('style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
@endsection
@section('content')
<div class="content">
  <div class="row">
  <div class="col-lg-12">
     <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>  Add new url   </h3>
        <a class="btn btn-info" href="{{ route('url') }}">Back</a>
    </div>
        <div class="card-body card-block">
            <form action="{{ route('url.store') }}" method="post"   class="form-horizontal"> 
                @csrf 
                <div class="form-group">
                    <label for="url" class=" form-control-label">URL Name <span class="text-danger">*</span></label>
                        <textarea name="url" id="url" cols="30" rows="3" class="form-control"></textarea> 
                    @if($errors->has('url'))
                        <div class="text-danger">{{ $errors->first('url') }}</div>
                    @endif   
                </div>  
                <div class="form-group">
                    <label for="instrument_id" class=" form-control-label">Book ID <span class="text-danger">*</span></label>
                    <select name="instrument_id" id="instrument_id" class="form-control-sm form-control">
                        <option value="">Please select book</option> 
                        @foreach($horns as $horn) 
                          <option value="{{ $horn->id }}">{{ $horn->horn_name }}</option> 
                        @endforeach
                    </select>
                      @if($errors->has('instrument_id'))
                        <div class="text-danger">{{ $errors->first('instrument_id') }}</div>
                    @endif   
                </div> 
                <div class="form-group">
                    <label for="exercise_id" class=" form-control-label">Exercise ID <span class="text-danger">*</span></label>
                    <select name="exercise_id" id="exercise_id" class="form-control-sm form-control">
                        <option value="">Please select Exercise</option> 
                        @foreach($exercises as $exercise) 
                          <option value="{{ $exercise->id }}">{{ $exercise->exercise_name }}</option> 
                        @endforeach
                    </select>
                      @if($errors->has('exercise_id'))
                        <div class="text-danger">{{ $errors->first('exercise_id') }}</div>
                    @endif   
                </div> 
                <div class="p-2">
                    <button type="submit" class="btn btn-success btn-sm">
                       <i class="fa fa-plus"></i> Save
                    </button> 
                </div>
            </form>
        </div> 
    </div>
  </div> 
  </div>
</div>
  
@endsection
 @push('script')   
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
@endpush