<?php

namespace App\Http\Controllers;

use App\Models\Faculty;

class FacultyController extends Controller
{

    public function getFacultyPrograms($id)
    {
        $programList = 
            Faculty::where('id', $id)
                        ->with('programs')
                        ->get();
        return response()->json($programList);
    }

}
