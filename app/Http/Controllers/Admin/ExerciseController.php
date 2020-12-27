<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class ExerciseController extends Controller
{
   function __construct(Request $request)
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          if ($request->ajax()) {
            $data = Exercise::with('book')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){ 
                    $btn = '<a href="javascript:void(0)"  data-remote='.route("exercise.destroy",$row->id).' class="delete btn btn-danger btn-sm">Delete</a> &nbsp; <a href="javascript:void(0)"  data-remote='.route("exercise.edit",$row->id).'  data-remote-update='.route("exercise.update",$row->id).' class="edit btn btn-info btn-sm">Edit</a> '; 
                    return $btn;
                }) 
                   ->addColumn('book_name', function($row){ 
                     return $row->book->name;
                })
                ->rawColumns(['action','book_name'])
                ->make(true);
        }
        $books   = Book::orderBy('created_at','desc')->get();
        return view('admin.pages.exercise.exercise',compact('books'));
    }
     public function create()
    {  
         $books   = Book::orderBy('created_at','desc')->get();
        return view('admin.pages.exercise.add-exercise',compact('books'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'exercise_name' => 'required', 
            'book_id' => 'required', 
        ]); 
         $exercise = new Exercise; 
         $exercise->exercise_name  = $request->exercise_name; 
         $exercise->book_id  = $request->book_id;
         $exercise->save();

         return redirect()->route('exercise');

    } 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'exercise_name' => 'required', 
             'book_id' => 'required',
        ]);
 
        $exercise = Exercise::find($id);
        $exercise->exercise_name  = $request->exercise_name; 
        $exercise->book_id  = $request->book_id;
        $exercise->save(); 

        return redirect()->route('exercise');

    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercise = Exercise::with('book')->find($id);
        if ($exercise) { 
            $exercise->get(); 
            return response()->json(['message' => 'success', 'data'=> $exercise]);
        }else{
            return response()->json(['message' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $exercise = Exercise::find($id);
        if ($exercise) { 
            $exercise->delete(); 
            return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'error']);
        }
    }
}
