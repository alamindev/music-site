<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Exercise;
use App\Models\Horn;
use Illuminate\Http\Request;

class StepController extends Controller
{
    /**
     * Display a listing of the book.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $books = Book::limit(2)->get();
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
            $book_id = $request->query('book_id');
            $instruments = Horn::where('book_id', $book_id)->get();
             return view('pages.step.instrument',compact('instruments'));
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
             $exercises = Exercise::where('book_id', $book_id)->where('horn_id', $instrument_id)->get();
             return view('pages.step.exercise',compact('exercises'));
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
            $book_id = $request->query('book_id');
            $instrument_id = $request->query('instrument_id');
            $exercise_id = $request->query('exercise_id');
             $exercise = Exercise::where('id', $exercise_id)->where('book_id', $book_id)->OrWhere('horn_id', $instrument_id)->first();
             return view('pages.step.viewer',compact('exercise'));
        }else{
            return redirect()->route('step.book');
        } 
       
    }

     
}
