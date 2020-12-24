<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class BookController extends Controller
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
            $data = Book::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){ 
                    $btn = '<a href="javascript:void(0)"  data-remote='.route("book.destroy",$row->id).' class="delete btn btn-danger btn-sm">Delete</a> &nbsp; <a href="javascript:void(0)"  data-remote='.route("book.edit",$row->id).'  data-remote-update='.route("book.update",$row->id).' class="edit btn btn-info btn-sm">Edit</a>'; 
                    return $btn;
                })
                ->addColumn('photo', function($row){ 
                    return '<img src='.asset('storage'. $row->image).' width="100" alt="book image">';
                }) 
                ->rawColumns(['action','photo'])
                ->make(true);
        }
      
        return view('admin.pages.book.book');
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
            'name' => 'required', 
            'photo' => 'required', 
        ]);
        $photo = $this->upload_photos($request);
         $book = new Book; 
         $book->name  = $request->name;
         $book->image  = $photo;
         $book->save();

         return redirect()->route('book');

    } 

     private function upload_photos($request)
    { 
       if ($request->has('photo')) {  
                $image = $request->file('photo'); 
                $name = 'book_'.time();   
                $folder = '/uploads/book/'; 
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();  
                $name = !is_null($name) ? $name : Str::random(25); 
                $image->storeAs($folder, $name.'.'.$image->getClientOriginalExtension(), 'public');
                return $filePath; 
            } 
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
            'name' => 'required',  
        ]); 
         $book = Book::find($id); 
         $img = $this->update_photo($request, $book);
         $book->name  = $request->name;
         $book->image  = $img;
         $book->save();

         return redirect()->route('book');

    } 
    /**
     * update photo
     */
     private function update_photo($request, $gallery)
    {  
            if ($request->has('photo')) { 
                $image = $request->file('photo'); 
                $name = 'book_'.time();  
                 $image_path =  $gallery->photo;  
                    if (Storage::exists($image_path)) {
                        Storage::delete($image_path); 
                    }  
                $folder = '/uploads/book/'; 
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();  
                $name = !is_null($name) ? $name : Str::random(25); 
                $image->storeAs($folder, $name.'.'.$image->getClientOriginalExtension(), 'public');
                 return $filePath; 
            } 
       
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        if ($book) { 
            $book->get(); 
            return response()->json(['message' => 'success', 'data'=> $book]);
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
         $book = Book::find($id);
        if ($book) {
            $file_path = $book->photo;  
            if (Storage::exists($file_path)) {
                Storage::delete($file_path); 
            }  
            $book->delete();

            return response()->json(['message' => 'success']);
        }else{
            return response()->json(['message' => 'error']);
        }
    }
}
