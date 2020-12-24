<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Horn;
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
            $data = Exercise::with('horn')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){ 
                    $btn = '<a href="javascript:void(0)"  data-remote='.route("exercise.destroy",$row->id).' class="delete btn btn-danger btn-sm">Delete</a> &nbsp; <a href="javascript:void(0)"  data-remote='.route("exercise.edit",$row->id).'  data-remote-update='.route("exercise.update",$row->id).' class="edit btn btn-info btn-sm">Edit</a>'; 
                    return $btn;
                })
                ->addColumn('horn_name', function($row){ 
                     return $row->horn->horn_name;
                })
                ->addColumn('code', function($row){ 
                     return \Illuminate\Support\Str::limit($row->code, 10,'...');
                })
                ->addColumn('type', function($row){ 
                     return $row->type == 0 ? 'flat.io' : 'sibl.pub';
                })
                ->rawColumns(['action','horn_name','type','code'])
                ->make(true);
        }
        $horns   = Horn::orderBy('created_at','desc')->get();
        return view('admin.pages.exercise.exercise',compact('horns'));
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
            'code' => 'required',  
            'horn_id' => 'required',  
            'type' => 'required',  
        ]);
        $instrument = Horn::find($request->horn_id);
         $exercise = new Exercise; 
         $exercise->exercise_name  = $request->exercise_name;
         $exercise->code  = $request->code;
         $exercise->horn_id  = $request->horn_id;
         $exercise->book_id  = $instrument->book_id;
         $exercise->type  = $request->type;
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
            'code' => 'required',  
            'horn_id' => 'required',  
            'type' => 'required',  
        ]);

        $instrument = Horn::find($request->horn_id);
        
        $exercise = Exercise::find($id);
        $exercise->exercise_name  = $request->exercise_name;
        $exercise->code  = $request->code;
        $exercise->horn_id  = $request->horn_id;
        $exercise->book_id  = $instrument->book_id;
        $exercise->type  = $request->type;
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
        $horn = Exercise::with('horn')->find($id);
        if ($horn) { 
            $horn->get(); 
            return response()->json(['message' => 'success', 'data'=> $horn]);
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
         $horn = Exercise::find($id);
        if ($horn) { 
            $horn->delete(); 
            return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'error']);
        }
    }
}
