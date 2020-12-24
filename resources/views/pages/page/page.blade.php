@extends('layouts.app')
@section('title')
    about-us
@endsection
@section('content')
    <section class="education-area-two " style="padding: 150px 0px 100px;">
       
        <div class="container">
            <div class="row"> 
                <div class="col-lg-12">
                   @if($page)
                        {!! $page->content !!}
                    @else
                        Not found!
                    @endif
                </div> 
            </div> 
        </div>
    </section>

@endsection
