@extends('admin.layouts.app')

@section('title')
  add    Exercise  
@endsection 
@section('content')
<div class="content">
  <div class="row">
  <div class="col-lg-12">
     <div class="card">
     <div class="card-header d-flex justify-content-between align-items-center">
        <h3>  Add new exercise   </h3>
        <a class="btn btn-info" href="{{ route('exercise') }}">Back</a>
    </div> 
        <div class="card-body card-block">
            <form action="{{ route('exercise.store') }}" method="post"   class="form-horizontal"> 
                @csrf 
                <div class="form-group">
                    <label for="exercise_name" class=" form-control-label">Exercise Name <span class="text-danger">*</span></label>
                        <input type="text" id="exercise_name" name="exercise_name" class="form-control" placeholder="Exercise name"> 
                    @if($errors->has('exercise_name'))
                        <div class="text-danger">{{ $errors->first('exercise_name') }}</div>
                    @endif   
                </div>  
                <div class="form-group">
                    <label for="book_id" class=" form-control-label">Book ID <span class="text-danger">*</span></label>
                    <select name="book_id" id="book_id" class="form-control-sm form-control">
                        <option value="">Please select book</option> 
                        @foreach($books as $book) 
                          <option value="{{ $book->id }}">{{ $book->name }}</option> 
                        @endforeach
                    </select>
                      @if($errors->has('book_id'))
                        <div class="text-danger">{{ $errors->first('book_id') }}</div>
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