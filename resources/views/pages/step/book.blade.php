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
                            <h4> <b>Step 1 - Choose the Book You are Using:</b></h4>
							<form id="rendered-form" method="get" action="" class="py-2"> 
                                <h1 access="false" id="control-5054511">Choose a Book</h1> 
                                <div class="wrapper">
                                    <select class="form-control book_name" name="book_id">
                                        <option value="">Choose a Book</option>
                                        @foreach($books as $book) 
                                            <option data-remote="{{ route('step.instrument',[$book->id]) }}" value="{{ $book->id }}">{{ $book->name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                             
                            
                            <div class="row pt-4">
                                @foreach($books as $book) 
                                    <div class="col-lg-3 col-sm-6">
                                    <div class="single-affordable one">
                                        <i class="">
                                            <img   src="{{ url('storage'.  $book->image) }}" alt="{{ $book->name }}"> 
                                        </i> 
                                        <h3>{{ $book->name }}</h3>
                                    </div>
                                </div> 
                                @endforeach
                            </div>  
                </div>
            </div> 
        </div>
    </section>
@endsection  

@section('script')
    <script>
        $(function(){
            $(".book_name").on("change", function(e) { 
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