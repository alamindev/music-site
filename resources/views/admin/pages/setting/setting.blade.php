@extends('admin.layouts.app')

@section('content')
<div class="content">
   <div class="card">
    <div class="card-header">
        Update Setting
    </div>
        <div class="card-body card-block">
            <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                @csrf
                <input type="hidden" name="id" value="{{ $setting ? $setting->id : '' }}"/>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="site_logo" class=" form-control-label">Site title</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="site_title" name="site_title" class="form-control" value="{{ $setting ? $setting->site_title : '' }}" > 
                        @if($errors->has('site_title'))
                            <div class="text-danger">{{ $errors->first('site_title') }}</div>
                        @endif  
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="site_logo" class=" form-control-label">Site Logo <span class="text-danger">(Image type must PNG,JPG)</span></label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="site_logo" name="site_logo" class="form-control-file"> 
                        @if($errors->has('site_logo'))
                                <div class="alert alert-danger">{{ $errors->first('site_logo') }}</div>
                            @endif
                            <div  class="py-2">
                        @if(!empty($setting) && $setting->site_logo != '')
                            <img src="{{ url('storage'.$setting->site_logo) }}" alt="site logo" width="100">
                        @endif
                        </div> 
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="favicon" class=" form-control-label">Favicon <span class="text-danger">(Image type must PNG,JPG)</span></label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="favicon" name="favicon"   class="form-control-file">
                        @if($errors->has('favicon'))
                            <div class="alert alert-danger">{{ $errors->first('favicon') }}</div>
                        @endif
                       <div  class="py-2">
                        @if(!empty($setting) && $setting->favicon != '')
                            <img src="{{ url('storage'.$setting->favicon) }}" alt="Favicon" width="100">
                        @endif
                       </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="copyright" class="form-control-label">Copyright</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="copyright" value="{{ $setting ? $setting->copyright : '' }}"  name="copyright" class="form-control">
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
@push('script')   
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
@endpush