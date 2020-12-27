@extends('admin.layouts.app')

@section('title')
Import data
@endsection 
@section('content')
<div class="content">
  <div class="row">
  <div class="col-lg-6 offset-lg-3">
     <div class="card">
    <div class="card-header">
      Add new instrument   
    </div>
        <div class="card-body card-block">
            <form action="{{ route('import.store') }}" method="post"   class="form-horizontal" enctype="multipart/form-data"> 
                @csrf 
                <div class="form-group">
                    <label for="file" class=" form-control-label">Select File<span class="text-danger">*</span></label>
                        <input type="file" id="file" name="file" class="form-control"> 
                    @if($errors->has('file'))
                        <div class="text-danger">{{ $errors->first('file') }}</div>
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