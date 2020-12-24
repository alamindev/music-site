@extends('admin.layouts.app')
@section('title')
    banner update
@endsection
@section('content')
<div class="content">
   <div class="card">
    <div class="card-header">
        Update Banner
    </div>
        <div class="card-body card-block">
            <form action="{{ route('banner.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                @csrf
                <input type="hidden" name="id" value="{{ $banner ? $banner->id : '' }}"/>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="title" class=" form-control-label">Title</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="title" name="title" class="form-control" value="{{ $banner ? $banner->title : '' }}" > 
                        @if($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif  
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="subtitle" class=" form-control-label">Subtitle</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ $banner ? $banner->subtitle : '' }}" >  
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="details" class=" form-control-label">Details</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="details" class="form-control" id="details" cols="30" rows="10">
                        {{ $banner ? $banner->details : '' }}
                        </textarea> 
                    </div>
                </div>
             <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image" class=" form-control-label">Banner image </label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="image" name="image" class="form-control-file">  
                        <div  class="py-2">
                        @if(!empty($banner) && $banner->image != '')
                            <img src="{{ url('storage'.$banner->image) }}" alt="Banner image" width="100">
                        @endif
                        </div> 
                    </div>
                </div>
                 <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="btn_text" class=" form-control-label">Button Text</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="btn_text" name="btn_text" class="form-control" value="{{ $banner ? $banner->btn_text : '' }}" >  
                    </div>
                </div> 
                 <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="btn_link" class=" form-control-label">Button Link</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="btn_link" name="btn_link" class="form-control" value="{{ $banner ? $banner->btn_link : '' }}" >  
                    </div>
                </div> 
                <div class="p-2">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-dot-circle-o"></i> update
                    </button> 
                </div>
            </form>
        </div> 
    </div>
</div>
@endsection
