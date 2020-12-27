@extends('layouts.app')
@section('title')
    Exercise
@endsection
@section('content')
  <section class="courses-area-style " style="padding: 150px 0px;">
        <div class="container">
            <div class="showing-result">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="showing-result-count">
                            <h4> <b>Step 3 - Select Your Exercise:</b></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($exercises as $exercise)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-course lessons-img-box">
                            <a href="{{ route('step.viewer',['exercise_id' => $exercise->id, 'instrument_id' => $instrument_id, 'book_id' => $exercise->book_id]) }}">
                                <img src="{{ asset('images/floating.png') }}" alt="Image">
                                <div class="course-content" style="border: none;">
                                    <span class="tag pt-2">{{ $exercise->exercise_name }} </span>
                                </div>
                            </a>
                        </div>
                    </div>  
                @empty
                <h2 class="pt-3">No exercise found. <a style="text-decoration: underline"  href="{{ route('step.book') }}">Please try again</a></h2>
            @endforelse
            </div>
        </div>
        </div>
    </section>
@endsection  