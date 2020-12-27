<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Horn;
use App\Models\Url;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class UrlController extends Controller
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
            $data = Url::with('horn')->with('exercise')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){ 
                    $btn = '<a href="javascript:void(0)"  data-remote='.route("url.destroy",$row->id).' class="delete btn btn-danger btn-sm">Delete</a> &nbsp; <a href="javascript:void(0)"  data-remote='.route("url.edit",$row->id).'  data-remote-update='.route("url.update",$row->id).' class="edit btn btn-info btn-sm">Edit</a> &nbsp; <a href="javascript:void(0)"  data-remote='.route("url.edit",$row->id).'  data-remote-update='.route("url.update",$row->id).' class="view btn btn-primary  btn-sm">View</a>'; 
                    return $btn;
                }) 
                ->addColumn('url', function($row){  
                       return \Illuminate\Support\Str::limit($row->url, 10,'...');
                })
                ->addColumn('instrument_name', function($row){  
                       return \Illuminate\Support\Str::limit($row->horn->horn_name, 15,'...');
                })
                ->addColumn('exercise_name', function($row){  
                     return \Illuminate\Support\Str::limit($row->exercise->exercise_name, 15,'...');
                })
                ->rawColumns(['action','instrument_name','exercise_name'])
                ->make(true);
        }
  
        $horns   = Horn::orderBy('created_at','desc')->get();
        $exercises   = Exercise::orderBy('created_at','desc')->get();
        return view('admin.pages.url.url',compact('horns','exercises'));
    }
 
    public function create()
    {  
        $horns   = Horn::orderBy('created_at','desc')->get();
        $exercises   = Exercise::orderBy('created_at','desc')->get();
        return view('admin.pages.url.add-url',compact('horns','exercises'));
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
            'url' => 'required', 
            'instrument_id' => 'required', 
            'exercise_id' => 'required', 
        ]); 
         $url = new Url; 
         $url->url  = $request->url; 
         $url->horn_id  = $request->instrument_id;
         $url->exercise_id  = $request->exercise_id;
         $url->save();

         return redirect()->route('url');

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
            'url' => 'required', 
             'instrument_id' => 'required', 
            'exercise_id' => 'required', 
        ]);
 
        $url = Url::find($id);
            $url->url  = $request->url; 
         $url->horn_id  = $request->instrument_id;
         $url->exercise_id  = $request->exercise_id;
        $url->save(); 

        return redirect()->route('url');

    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = Url::with('horn')->with('exercise')->find($id);
        if ($url) { 
            $url->get(); 
            return response()->json(['message' => 'success', 'data'=> $url]);
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
         $url = Url::find($id);
        if ($url) { 
            $url->delete(); 
            return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'error']);
        }
    }
}
