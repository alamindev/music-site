 @extends('layouts.app')

@section('title')
   Add new Service
@endsection

@section('style')
    <link href="{{ asset('assets/css/lib/chosen/chosen.css') }}" rel="stylesheet"> 
@endsection
@section('content')
<div class="content">
    <form action="{{ route('services.store') }}" method="post"  enctype="multipart/form-data" class="form-horizontal"> 
        @csrf 
        <div class="row">  
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                       Service
                    </div>
                    <div class="card-body card-block"> 
                        <div class="form-group">
                            <label for="title" class=" form-control-label">Title <span class="text-danger">*</span></label>
                            <input type="text" required id="title" name="title" class="form-control" placeholder="Enter service title"> 
                            @if($errors->has('title'))
                                <div class="text-danger">{{ $errors->first('title') }}</div>
                            @endif   
                        </div>    
                        <div class="form-group">
                            <label for="basic_price" class="form-control-label">Basic price <span class="text-danger">*</span></label>
                            <input type="number" required id="basic_price" name="basic_price" class="form-control" > 
                            @if($errors->has('basic_price'))
                                <div class="text-danger">{{ $errors->first('basic_price') }}</div>
                            @endif   
                        </div>    
                        <div class="form-group">
                            <label for="category" class=" form-control-label">Select Category <span class="text-danger">*</span></label>
                           <select required data-placeholder="Choose Category" name="category_id" id="category" class="form-control">
                               <option value="" label="default"></option>
                                @foreach (App\Models\ServiceCategory::orderBy('created_at','desc')->get() as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                                @endforeach
                           </select>
                            @if($errors->has('category_id'))
                                <div class="text-danger">{{ $errors->first('category_id') }}</div>
                            @endif   
                        </div>    
                        <div class="form-group">
                            <label for="image" class=" form-control-label">Upload Photo<span class="text-danger">*</span></label>
                           <input  type="file" name="image" required id="image" class="form-control" />
                            @if($errors->has('image'))
                                <div class="text-danger">{{ $errors->first('image') }}</div>
                            @endif   
                        </div>    
                        <div class="form-group pb-3">
                            <div class="d-flex justify-content-between pb-2">
                            <label for="image" class=" form-control-label">Features <span class="text-danger">(optional)</span></label>
                            <button type="button" class="btn btn-sm btn-info add-new-feature"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="feature">
                                <div class="list-group">
                                    <div class="list-group-item d-flex align-items-center">
                                        <div class="px-1"><input type="text" name="key[]" placeholder="Feature title" class="form-control"></div>
                                        <div class="px-1"><input type="text" name="value[]"  placeholder="Feature details"  class="form-control"></div>
                                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="details" class="form-control-label">Description<span class="text-danger">(optional)</span></label>
                            <textarea name="details" id="details" class="form-control"></textarea>
                        </div>    
                    </div> 
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                       Service includes
                    </div>
                    <div class="card-body card-block">   
                        <div class="form-group pb-3">
                            <div class="d-flex justify-content-between pb-2">
                            <label for="image" class=" form-control-label">Service Includes <span class="text-danger">(optional)</span></label>
                            <button type="button" class="btn btn-sm btn-success add-new-includes"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="service-include">
                                <div class="list-group">
                                    <div class="list-group-item d-flex align-items-center">
                                       <div class="pr-2" style="flex: 1">
                                            <div class="py-1">
                                                <input type="text" required name="include_title[]" placeholder="Enter title" class="form-control">
                                            </div>
                                            <div class="py-1">
                                                <textarea name="description[]" id="" cols="30" rows="2" class="form-control" placeholder="Enter short details"></textarea>
                                            </div>
                                            <div class="py-1">
                                                <input type="number" required name="price[]"  placeholder="Enter price"  class="form-control">
                                            </div>
                                       </div>
                                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="card">
                    <div class="card-header">
                       Service material cost
                    </div>
                    <div class="card-body card-block">   
                        <div class="form-group pb-3">
                            <div class="d-flex justify-content-between pb-2">
                            <label for="image" class=" form-control-label">Service cost <span class="text-danger">(optional)</span></label>
                            <button type="button" class="btn btn-sm btn-success add-new-cost"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="material-cost">
                                <div class="list-group">
                                    <div class="list-group-item d-flex align-items-center">
                                       <div class="pr-2" style="flex: 1"> 
                                            <div class="py-1">
                                                <textarea name="cost_title[]" id="" cols="30" rows="2" class="form-control" placeholder="Enter title"></textarea>
                                            </div> 
                                       </div>
                                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                </div>
                <div class="card">
                    <div class="card-header">
                       Service Questions
                    </div>
                    <div class="card-body card-block">   
                        <div class="form-group pb-3">
                            <div class="d-flex justify-content-between pb-2">
                            <label for="image" class=" form-control-label">Service Questions <span class="text-danger">(optional)</span></label>
                            <button type="button" class="btn btn-sm btn-success add-new-question"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="service-question">
                                <div class="list-group">
                                    <div class="list-group-item d-flex align-items-center">
                                       <div class="pr-2" style="flex: 1">
                                            <div class="py-1">
                                                <input type="text" required name="question_title[]" placeholder="Enter title" class="form-control">
                                            </div> 
                                            <div class="py-1">
                                                <input type="number" required name="question_price[]"  placeholder="Enter price"  class="form-control">
                                            </div>
                                       </div>
                                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body d-flex justify-content-center">
              <button type="submit" class="btn btn-info">Submit</button>
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
