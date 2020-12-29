 @extends('admin.layouts.app')

@section('title')
   Update User
@endsection

@section('style')
    <link href="{{ asset('assets/css/lib/chosen/chosen.css') }}" rel="stylesheet"> 
@endsection
@section('content')
<div class="content">
    <form action="{{ route('user.update', $edit->id) }}" method="post"  enctype="multipart/form-data" class="form-horizontal"> 
        @csrf 
       <div class="row">  
              <div class="col-lg-12">
               <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Update users</h3>
                    <a href="{{ route('users') }}" class="btn btn-info">Back</a>
                </div> 
                <div class="card-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text"  id="first_name" name="first_name" class="form-control  @error('first_name') is-invalid @enderror" value="{{ $edit->first_name }}">
                         @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text"  id="last_name" name="last_name" class="form-control  @error('last_name') is-invalid @enderror" value="{{ $edit->last_name }}">
                         @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"  id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $edit->email }}">
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                         <input id="phone" minlength="10" maxlength="10" value="{{ $edit->phone }}" required class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="A 10 digit phone number required">
                           @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="school_name">School name</label>
                        <input type="text"  id="school_name" name="school_name" class="form-control @error('school_name') is-invalid @enderror" value="{{ $edit->school_name }}">
                        @error('school_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text"  id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $edit->city }}">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text"  id="state" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ $edit->state }}">
                         @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text"  id="country" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ $edit->country }}">
                         @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="teacher_name">Teacher name <span>(Optional)</span></label>
                        <input type="text"  id="teacher_name" name="teacher_name" class="form-control" value="{{ $edit->teacher_name }}">
                    </div>
                     <div class="form-group">
                        <label for="photo">Photo <span>(Optional)</span></label>
                            <input class="form-control" type="file" name="photo" > 
                    </div>
                    <div class="py-2">
                    @if($edit->photo == null)
                           Image not found
                        @else
                            <img class="rounded-circle" width="100" src="{{ url('storage'. $edit->photo) }}" alt="User Avatar"> 
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm"   autocomplete="new-password" class="form-control" type="password" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </div> 
            </div>
            </div> 
        </div> 
    </form>
</div>
@endsection
@push('script')  
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
 
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>    
<script src="{{ asset('assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>    
<script>
       CKEDITOR.replace('content', { 
            filebrowserUploadUrl: "{{asset('admin/page/uploads?_token=' . csrf_token()) }}&type=file", 
            imageUploadUrl: "{{asset('admin/page/uploads?_token='. csrf_token() )  }}&type=image",
            filebrowserBrowseUrl: "{{asset('admin/page/file_browser') }}",
            filebrowserUploadMethod: 'form' 
		}); 
    jQuery("#type").chosen({ 
        no_results_text: "Oops, nothing found!",
        width: "100%"
    });
</script>
@endpush
