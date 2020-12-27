<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Horn;
use App\Models\Url;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ImportController extends Controller
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
    public function index()
    { 
        return view('admin.pages.import.import');
    }
    /**
     * store data
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
         $request->validate([
            'file' => 'required',  
        ]);
        
         Excel::import(new Url(), $request->file('file'));

         return  redirect()->route('url');
    }
 
}
