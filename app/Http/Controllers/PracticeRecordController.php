<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeRecordController extends Controller
{
     public function index()
    {  
        return view('pages.practice_record.practice_record');
    }
}
