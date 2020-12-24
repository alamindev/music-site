@extends('layouts.app')
@section('title')
    Exercise
@endsection
@section('content')
 <section class="courses-area-style " style="padding: 150px 0px;">
        <div class="container">
            <div class="showing-result">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-4">
                        <div class="showing-result-count">
                            <h4> <b>Step 2 - Select Your Instrument:</b></h4>
							<form id="rendered-form" method="get" action="" class="py-2"> 
                                  <div class="wrapper"> 
                                    <select class="form-control instrument" name="instrument_id">
                                        <option value="">Choose a instrument</option>
                                        @foreach($instruments as $instrument) 
                                            <option data-book-id="{{ $instrument->book_id }}" data-remote="{{ route('step.exercise',[$instrument->id]) }}" value="{{ $instrument->id }}">{{ $instrument->horn_name }}</option> 
                                        @endforeach
                                    </select>
                                          <input type="hidden" name="book_id" class="book_id" value="">
                                </div>
                            </form>  
                </div>
            </div> 
        </div>
    </section>
@endsection  

@section('script')
    <script>
        $(function(){
            $(".instrument").on("change", function(e) { 
                if($(this).find(":selected").val() != ''){
                    var url = $(this).find(":selected").attr('data-remote')
                    var book_id = $(this).find(":selected").attr('data-book-id')
                    $('.book_id').val(book_id)
                    let form = $(this).closest('form');
                    form.attr('action',url) 
                    form.submit();
                } 
            });
        })
    </script>
@endsection