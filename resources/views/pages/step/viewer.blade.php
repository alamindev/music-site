@extends('layouts.app')
@section('title')
    Exercise
@endsection
@section('content')
    <section class="courses-area-style " style="padding: 150px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(!empty($exercise))
                       <div class="embed-responsive embed-responsive-16by9">
                        @if($exercise->type == 0) 
                            <iframe class="embed-responsive-item" src="https://flat.io/embed/{{ $exercise->code }}"></iframe> 
                        @else
                            <iframe class="embed-responsive-item" src="https://sibl.pub/{{ $exercise->code }}"></iframe> 
                        @endif
                        </div>
                    @else
                        Not found! try again
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection  