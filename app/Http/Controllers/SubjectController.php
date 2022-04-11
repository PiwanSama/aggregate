<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class SubjectController extends Controller
{
    
    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects);
    }

}
