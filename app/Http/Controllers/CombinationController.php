<?php

namespace App\Http\Controllers;

use App\Models\Combination;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class CombinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combinations = Combination::all();
        return response()->json($combinations);
    }

}