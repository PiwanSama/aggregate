<?php

namespace App\Http\Controllers;

use App\Models\Combination;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class CombinationController extends Controller
{
    
    public function index()
    {
        $combinations = Combination::all();
        return response()->json($combinations);
    }

    public function calculatePointsAdvanced(Request $request){
        $p_one = $request->principle_one;
        $p_two = $request->principle_two;
        $p_three = $request->principle_three;
        $sub = $request->subsidiary;
        $gp = $request->general_paper;

        $p_one_val = $this->getGradeValue($p_one);
        $p_two_val = $this->getGradeValue($p_two);
        $p_three_val = $this->getGradeValue($p_three);
        
        return $p_one_val+$p_two_val+$p_three_val+$sub+$gp;
    }

    public function calculatePointsOrdinary(Request $request){
        $total_points = 0;
        foreach($request->all() as $subject){
            $total_points+=$this->getSubjectValue($subject);
        }
        return $total_points;
    }

    public function calculateWeightsOrdinary(Request $request){
        $subjects = array();
        $best_weight = 0;
        $total_weight = 0;

        foreach ($request->all() as $item){
            array_push($subjects, $this->getOrdinaryWeightValue($item));
        }

        sort($subjects);
        
        for ($i = 0; $i<8; $i++){
            $current = $subjects[$i];
            $best_weight+=$current;
        }

        for ($i = 0; $i<10; $i++){
            $current = $subjects[$i];
            $total_weight+=$current;
        }
        
        return response()->json([
            'best_weight'=>$best_weight,
            'total_weight'=>$total_weight
        ]);
    }

    private function getGradeValue($grade){
        switch($grade){
            case "A":return 6;break;
            case "B":return 5;break;
            case "C":return 4;break;
            case "D":return 3;break;
            case "E":return 2;break;
            case "O":return 1;break;
            case "F":return 0;break;
        }
    }

    private function getSubjectValue($subject){
        switch($subject){
            case "D1":return 0.3;break;
            case "D2":return 0.3;break;
            case "C3":return 0.2;break;
            case "C4":return 0.2;break;
            case "C5":return 0.2;break;
            case "C6":return 0.2;break;
            case "P7":return 0.1;break;
            case "P8":return 0.1;break;
            case "F9":return 0.1;break;
        }
    }

    private function getOrdinaryWeightValue($subject){
        switch($subject){
            case "D1":return 1;break;
            case "D2":return 2;break;
            case "C3":return 3;break;
            case "C4":return 4;break;
            case "C5":return 5;break;
            case "C6":return 6;break;
            case "P7":return 7;break;
            case "P8":return 8;break;
            case "F9":return 9;break;
        }
    }

}