<?php

namespace App\Http\Controllers;

use App\Models\LocalUniversity;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    
    public function index()
    {
        $universities = LocalUniversity::all();
        return response()->json($universities);
    }

}
