<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Horn;
use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class HornController extends Controller
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
            $data = Horn::with('book')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){ 
                    $btn = '<a href="javascript:void(0)"  data-remote='.route("instrument.destroy",$row->id).' class="delete btn btn-danger btn-sm">Delete</a> &nbsp; <a href="javascript:void(0)"  data-remote='.route("instrument.edit",$row->id).'  data-remote-update='.route("instrument.update",$row->id).' class="edit btn btn-info btn-sm">Edit</a>'; 
                    return $btn;
                })
                ->addColumn('book_name', function($row){ 
                     return $row->book->name;
                })
                ->rawColumns(['action','book_name'])
                ->make(true);
        }
        $books   = Book::orderBy('created_at','desc')->get();
        return view('admin.pages.instrument.instrument',compact('books'));
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
            'horn_name' => 'required',
            'book_id' => 'required',  
        ]);

         $horn = new Horn; 
         $horn->horn_name  = $request->horn_name;
         $horn->book_id  = $request->book_id;
         $horn->save();

         return redirect()->route('instrument');

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
            'horn_name' => 'required', 
            'book_id' => 'required', 
        ]);

         $horn = Horn::find($id); 
         $horn->horn_name  = $request->horn_name;
        $horn->book_id  = $request->book_id;
         $horn->save();

         return redirect()->route('instrument');

    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horn = Horn::with('book')->find($id);
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
         $horn = Horn::find($id);
        if ($horn) {
            
            $horn->delete();

            return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'error']);
        }
    }
}
