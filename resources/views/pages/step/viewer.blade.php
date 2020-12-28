@extends('layouts.app')
@section('title')
    Exercise
@endsection
@section('content')
    <section class="courses-area-style " style="padding: 100px 0px;">
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
            <div class="row">
                <div class="col-lg-4">
                    <div class="d-flex justify-content-start pt-5">
                        <form action="{{ route('step.viewer') }}" method="get"> 
                            @if(!empty($previous))
                            <input type="hidden" name="exercise_id" value="{{ $previous->exercise_id }}">
                            <input type="hidden" name="instrument_id" value="{{ $previous->horn_id }}">
                            <input type="hidden" name="book_id" value="{{ app('request')->input('book_id') }}">
                            @endif
                             <button @if(!$previous) disabled @endif  type="submit" class="btn btn-success">Previous</button>
                        </form> 
                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="d-flex justify-content-center pt-5">
                        <form action="{{ route('step.completed') }}" method="post">
                            @csrf  
                            <input type="hidden" class="timer" name="time" value="00:00" >
                            <input type="hidden" name="url_id" value="{{$exercise->id}}">
                            <button type="submit" class="btn btn-success">  Completed</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex justify-content-end pt-5">
                        <form action="{{ route('step.viewer') }}" method="get"> 
                             @if(!empty($next))
                            <input type="hidden" name="exercise_id" value="{{ $next->exercise_id }}">
                            <input type="hidden" name="instrument_id" value="{{ $next->horn_id }}">
                            <input type="hidden" name="book_id" value="{{ app('request')->input('book_id') }}">
                            @endif   
                             <button @if(!$next) disabled @endif  type="submit" class="btn btn-success">Next</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection  
 
@section('script')

<script>
    $(function (){
        var timer = $(".timer"); 
        var totalSeconds = 0; 
        setInterval(setTime, 1000);

        function setTime() {
            ++totalSeconds;
            timer.val(pad(parseInt(totalSeconds / 60)) + " : " + pad(totalSeconds % 60)) 
        }

        function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
        }
    })
</script>

@endsection