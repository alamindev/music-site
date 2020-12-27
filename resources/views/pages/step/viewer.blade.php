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
                            <iframe  id="frame" class="embed-responsive-item" src="{{ $exercise->url }}"></iframe>  
                        </div>
                    @else
                        Not found! try again
                    @endif
                </div> 
            </div>
        </div>
    </section>
@endsection  
 