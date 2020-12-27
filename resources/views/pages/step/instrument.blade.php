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
							@if(count($instruments) > 0)
                                <form id="rendered-form" method="get" action="" class="py-2"> 
                                    <div class="wrapper"> 
                                        <select class="form-control instrument" name="instrument_id">
                                            <option value="">Choose a instrument</option>
                                            @foreach($instruments as $instrument) 
                                                <option data-remote="{{ route('step.exercise',[$instrument->id]) }}" value="{{ $instrument->id }}">{{ $instrument->horn_name }}</option> 
                                            @endforeach
                                        </select>
                                            <input type="hidden" name="book_id" class="book_id" value="{{ $book_id }}">
                                    </div>
                                </form>  
                            @else
                                <h2 class="pt-3">No Instruments found.  <a style="text-decoration: underline"  href="{{ route('step.book') }}">Please try again</a></h2>
                            @endif
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
                    let form = $(this).closest('form');
                    form.attr('action',url) 
                    form.submit();
                } 
            });
        })
    </script>
@endsection