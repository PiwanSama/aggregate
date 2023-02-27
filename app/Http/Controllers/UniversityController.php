<?php

namespace App\Http\Controllers;

use App\Models\LocalUniversity;

class UniversityController extends Controller
{
    
    public function listAll()
    {
        $universities = LocalUniversity::with('district')->get();
        return response()->json($universities);
    }

    public function getUniversityProfile($id)
    {
        $universityProfile = 
            LocalUniversity::where('id', $id)
                        ->with('district')
                        ->with('details')
                        ->with('faculties')
                        ->with('location')
                        ->with('services')
                        ->with('programs')
                        ->with('scholarships')
                        ->get();
        return response()->json($universityProfile);
    }

}
