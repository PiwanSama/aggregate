<?php

namespace App\Http\Controllers;

use App\Models\LocalUniversity;
use App\Models\UniversityDetails;

class UniversityController extends Controller
{
    protected $table = 'university_details';
    
    public function index()
    {
        $universities = LocalUniversity::with('district')->get();
        return response()->json($universities);
    }

    public function show($id)
    {
        $university = UniversityDetails::where('university_id', $id)->get();
        return response()->json($university);
    }

}
