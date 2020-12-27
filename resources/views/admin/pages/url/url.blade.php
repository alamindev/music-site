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
        <h3>   List of url   </h3>
        <a class="btn btn-primary" href="{{ route('url.add') }}">Add New Url</a>
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered yajra-datatable" id="datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>URL</th>  
                <th>Instrument Name</th>  
                <th>Exercise Name</th>  
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        </div> 
    </div>
  </div>
  </div>
</div>
  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
             <form id="update-url" action="" method="post"   class="form-horizontal"> 
                @csrf 
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="smallmodalLabel">Update URL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="form-group">
                    <label for="url" class=" form-control-label">URL Name <span class="text-danger">*</span></label>
                        <textarea name="url" id="url" cols="30" rows="3" class="url form-control"></textarea> 
                    @if($errors->has('url'))
                        <div class="text-danger">{{ $errors->first('url') }}</div>
                    @endif   
                </div>  
                <div class="form-group">
                    <label for="instrument_id" class=" form-control-label">Book ID <span class="text-danger">*</span></label>
                    <select name="instrument_id" id="instrument_id" class="update-select-instrument form-control-sm form-control">
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
                    <select name="exercise_id" id="exercise_id" class="update-select-exercise form-control-sm form-control">
                        <option value="">Please select Exercise</option> 
                        @foreach($exercises as $exercise) 
                          <option value="{{ $exercise->id }}">{{ $exercise->exercise_name }}</option> 
                        @endforeach
                    </select>
                      @if($errors->has('exercise_id'))
                        <div class="text-danger">{{ $errors->first('exercise_id') }}</div>
                    @endif   
                </div> 
                </div>
                <div class="modal-footer">
                      <button type="Submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
  <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="smallmodalLabel">View Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
              <div class="modal-body">
                <div class="py-3">
                    <strong>Url: </strong> <span class="view_url " style="word-wrap: break-word;"></span>
                </div>
                <div class="py-3">
                    <strong>Instrument Name:</strong> <span class="view_instrument"></span>
                </div>
                <div class="py-3">
                    <strong>Exercise Name:</strong> <span class="view_exercise"></span>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
@push('script') 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script> 
    $(function () {
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('url') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'}, 
            {data: 'url', name: 'url'},  
              {data: 'instrument_name', name: 'instrument_name'}, 
              {data: 'exercise_name', name: 'exercise_name'}, 
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    $('#datatable').on('click', '.delete', function (e) {  
    Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this Data!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.value) { 
                    e.preventDefault();
                        var url = $(this).data('remote');  
                        $.ajax({
                            url:url ,
                            type: 'DELETE',
                            dataType: 'json',
                            data: {method: '_DELETE', submit: true}
                        }).always(function (data) {
                            if(data.message == 'error'){
                            Swal.fire(
                                'Error!',
                                'Something went wrong',
                                'error'
                                )
                            }else{
                                Swal.fire(
                                'Deleted!',
                                'Your Data has been deleted.',
                                'success'
                                ) 
                            $('#datatable').DataTable().draw(false);
                            }
                            
                        });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                    'Cancelled',
                    'Your Data file is safe :)',
                    'error'
                    )
                }
            }) 
    }); 
    $('#datatable').on('click', '.edit', function (e) {   
     var url = $(this).data('remote');  
     var update = $(this).data('remote-update');  
    $.ajax({
        url:url ,
        type: 'GET',
        dataType: 'json',
        data: {method: '_GET'}
    }).always(function (data) {
        if(data.message == 'success'){ 
            $('#update').modal('show'); 
            $('#update-url').attr('action', update) 
            $('.url').val(data.data.url)
            $('.update-select-instrument').val(data.data.horn.id).change();
            $('.update-select-exercise').val(data.data.exercise.id).change();
              
        } 
    });
    }); 
    $('#datatable').on('click', '.view', function (e) {   
     var url = $(this).data('remote');  
     var update = $(this).data('remote-update');  
    $.ajax({
        url:url ,
        type: 'GET',
        dataType: 'json',
        data: {method: '_GET'}
    }).always(function (data) {
        if(data.message == 'success'){ 
            $('#view').modal('show');  
            $('.view_url').text(data.data.url)
            $('.view_instrument').text(data.data.horn.horn_name);
            $('.view_exercise').text(data.data.exercise.exercise_name); 
        } 
    });
    }); 
  });
</script>
@endpush
