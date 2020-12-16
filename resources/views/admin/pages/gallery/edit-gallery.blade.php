 @extends('layouts.app')

@section('title')
   Edit Photo
@endsection

@section('style')
    <link href="{{ asset('assets/css/lib/chosen/chosen.css') }}" rel="stylesheet"> 
@endsection
@section('content')
<div class="content">
    <form action="{{ route('gallery.update', $edit->id) }}" method="post"  enctype="multipart/form-data" class="form-horizontal"> 
        @csrf 
        <div class="row">  
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                       Photo
                    </div>
                    <div class="card-body card-block"> 
                    
                        
                        <div class="form-group">
                            <label for="title" class=" form-control-label">Title <span class="text-danger">(Optional)</span></label>
                                <input type="text"   id="title" name="title" value="{{ $edit->title }}" class="form-control" placeholder="Enter service title"> 
                        </div>    
                         <div class="form-group">
                            <label for="photo" class=" form-control-label">Upload Photo<span class="text-danger">*</span></label>
                           <input  type="file" name="photo"   id="photo" class="form-control" />
                           <img src="{{ asset('storage'. $edit->photo) }}" width="150" class="mt-2" alt="gallery-photo">
                            @if($errors->has('photo'))
                                <div class="text-danger">{{ $errors->first('photo') }}</div>
                            @endif   
                        </div>    
                        <div class="form-group">
                            <label for="category" class=" form-control-label">Select Category <span class="text-danger">*</span></label>
                           <select required data-placeholder="Choose Category" name="category_id" id="category" class="form-control">
                               <option value="" label="default"></option>
                                @foreach (App\Models\ServiceCategory::orderBy('created_at','desc')->get() as $cate)
                                    <option value="{{ $cate->id }}" @if($cate->id == $edit->category_id) selected @endif>{{ $cate->cate_name }}</option>
                                @endforeach
                           </select>
                            @if($errors->has('category_id'))
                                <div class="text-danger">{{ $errors->first('category_id') }}</div>
                            @endif   
                        </div>    
                       
                        <div class="form-group">
                            <label for="details" class="form-control-label">Description<span class="text-danger">(optional)</span></label>
                            <textarea name="details" id="details" class="form-control">{{ $edit->details }}</textarea>
                        </div>    
                         <button type="submit" class="btn btn-info">Update</button>
                    </div> 
                </div>
            </div> 
        </div> 
    </form>
</div>
@endsection
@push('script') 
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>    
<script src="{{ asset('assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>    
<script>
   CKEDITOR.replace( 'details' );
    jQuery("#category").chosen({ 
        no_results_text: "Oops, nothing found!",
        width: "100%"
    });
</script>
@endpush
