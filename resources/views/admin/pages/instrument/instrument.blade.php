@extends('admin.layouts.app')

@section('title')
    instrument list
@endsection
@section('style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
@endsection
@section('content')
<div class="content">
  <div class="row">
  <div class="col-lg-4">
     <div class="card">
    <div class="card-header">
      Add new instrument   
    </div>
        <div class="card-body card-block">
            <form action="{{ route('instrument.store') }}" method="post"   class="form-horizontal"> 
                @csrf 
                <div class="form-group">
                    <label for="horn_name" class=" form-control-label">Instrument Name <span class="text-danger">*</span></label>
                        <input type="text" id="horn_name" name="horn_name" class="form-control" placeholder="instrument name"> 
                    @if($errors->has('horn_name'))
                        <div class="text-danger">{{ $errors->first('horn_name') }}</div>
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
  <div class="col-lg-8">
   <div class="card">
    <div class="card-header">
        List of instrument
    </div>
        <div class="card-body card-block">
             <table class="table table-bordered yajra-datatable" id="datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Instrument Name</th> 
                <th>Book Name</th>  
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
             <form id="update-instrument" action="" method="post"   class="form-horizontal"> 
                @csrf 
                <div class="modal-header d-flex">
                    <h5 class="modal-title" id="smallmodalLabel">Update horn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                  <div class="form-group">
                    <label for="horn_name" class=" form-control-label">instrument Name <span class="text-danger">*</span></label>
                        <input type="text" id="horn_name" name="horn_name" class="form-control instrument_update" placeholder="instrument name" required>  
                </div>  
                <div class="form-group">
                    <label for="book_id" class=" form-control-label">horn ID <span class="text-danger">*</span></label>
                    <select name="book_id" id="book_id" class="update-select-horn form-control-sm form-control">
                        <option value="">Please select book</option> 
                        @foreach($books as $book) 
                          <option value="{{ $book->id }}">{{ $book->name }}</option> 
                        @endforeach
                    </select>
                </div> 
                </div>
                <div class="modal-footer">
                      <button type="Submit" class="btn btn-primary">Update</button>
                </div>
                </form>
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
        ajax: "{{ route('instrument') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'}, 
            {data: 'horn_name', name: 'horn_name'}, 
            {data: 'book_name', name: 'book_name'}, 
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
            $('#update-instrument').attr('action', update) 
            $('.instrument_update').val(data.data.horn_name) 
            $('.update-select-horn').val(data.data.book.id).change();
        } 
    });
    }); 
  });
</script>
@endpush
