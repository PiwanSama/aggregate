<?php

namespace App\Http\Controllers;

use App\Models\LocalUniversity;
use App\Models\LocalUniversityWithDetails;

class UniversityController extends Controller
{
    
    public function index()
    {
        $universities = LocalUniversity::with('district')->get();
        return response()->json($universities);
    }

    public function universityWithDetails()
    {
        $university_details = LocalUniversityWithDetails::with('district', 'details')->get();
        return response()->json($university_details);
    }

}
