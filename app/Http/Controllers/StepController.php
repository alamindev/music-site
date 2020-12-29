<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Exercise;
use App\Models\Horn;
use App\Models\Session as userSession;
use App\Models\Url; 
use Illuminate\Http\Request; 

class StepController extends Controller
{
    function __construct(Request $request)
    {
        $this->middleware('auth')->except('index'); 
    }
    /**
     * Display a listing of the book.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $books = Book::orderBy('created_at','desc')->get();
        return view('pages.step.book',compact('books'));
    }
    /**
     * Display a listing of the instrument.
     *
     * @return \Illuminate\Http\Response
     */
    public function instrument(Request $request)
    { 
        if($request->has('book_id')){ 
            $instruments = Horn::get(); 
            $book_id = $request->book_id;
            return view('pages.step.instrument',compact('instruments','book_id'));
        }else{
            return redirect()->route('step.book');
        } 
       
    }
    /**
     * Display a listing of the instrument.
     *
     * @return \Illuminate\Http\Response
     */
    public function exercise(Request $request)
    {  
        if($request->has('book_id') && $request->has('instrument_id')){
            $book_id = $request->query('book_id');
            $instrument_id = $request->query('instrument_id');
             $exercises = Exercise::where('book_id', $book_id)->get();
             return view('pages.step.exercise',compact('exercises', 'instrument_id'));
        }else{
            return redirect()->route('step.book');
        } 
       
    }
    /**
     * Display a listing of the viewer.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewer(Request $request)
    {  
        if($request->has('exercise_id') && $request->has('book_id') || $request->has('instrument_id')){ 
            $instrument_id = $request->query('instrument_id');
            $exercise_id = $request->query('exercise_id');
            $exercise = Url::where('exercise_id', $exercise_id)->where('horn_id', $instrument_id)->first();

            $next = '';
            $previous = '';
            $next = Url::where('exercise_id', $exercise_id)->where('id', '>' ,$exercise->id)->orderBy('id','asc')->first();
            $previous = Url::where('exercise_id', $exercise_id)->where('id', '<' ,$exercise->id)->orderBy('id','desc')->first();


            return view('pages.step.viewer',compact('exercise','next','previous'));
        }else{
            return redirect()->route('step.book');
        } 
       
    }
    /**
     * store completed data
     *
     * @return \Illuminate\Http\Response
     */
    public function completed(Request $request)
    {  
        if($request->has('url_id')){ 
            $session = new userSession;
            $session->url_id = $request->url_id;
            $session->minutes = $request->time;
            $session->user_id = auth()->user()->id;
            $session->save();
            \Session::flash('success', 'Lession Completed successfully!');
            return redirect()->route('step.book');
        }else{
            return redirect()->route('step.book');
        } 
       
    }

     
}
