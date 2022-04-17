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
        $s_one = $request->sub_one;
        $s_two = $request->sub_two;
        $s_three = $request->sub_three;
        $s_four = $request->sub_four;
        $s_five = $request->sub_five;
        $s_six = $request->sub_six;
        $s_seven = $request->sub_seven;
        $s_eight = $request->sub_eight;
        $s_nine = $request->sub_nine;
        $s_ten= $request->sub_ten;

        $s_one_val = $this->getSubjectValue($s_one);
        $s_two_val = $this->getSubjectValue($s_two);
        $s_three_val = $this->getSubjectValue($s_three);
        $s_four_val = $this->getSubjectValue($s_four);
        $s_five_val = $this->getSubjectValue($s_five);
        $s_six_val = $this->getSubjectValue($s_six);
        $s_seven_val = $this->getSubjectValue($s_seven);
        $s_eight_val = $this->getSubjectValue($s_eight);
        $s_nine_val = $this->getSubjectValue($s_nine);
        $s_ten_val = $this->getSubjectValue($s_ten);
        
        return $s_one_val+$s_two_val+$s_three_val+$s_four_val+$s_five_val+$s_six_val+$s_seven_val+$s_eight_val+$s_nine_val+$s_ten_val;
    }

    public function calculateWeightsOrdinary(Request $request){
        $subjects = array();
        $s_one = $request->sub_one;
        $s_two = $request->sub_two;
        $s_three = $request->sub_three;
        $s_four = $request->sub_four;
        $s_five = $request->sub_five;
        $s_six = $request->sub_six;
        $s_seven = $request->sub_seven;
        $s_eight = $request->sub_eight;
        $s_nine = $request->sub_nine;
        $s_ten= $request->sub_ten;

        $s_one_val = $this->getOrdinaryWeightValue($s_one);
        $s_two_val = $this->getOrdinaryWeightValue($s_two);
        $s_three_val = $this->getOrdinaryWeightValue($s_three);
        $s_four_val = $this->getOrdinaryWeightValue($s_four);
        $s_five_val = $this->getOrdinaryWeightValue($s_five);
        $s_six_val = $this->getOrdinaryWeightValue($s_six);
        $s_seven_val = $this->getOrdinaryWeightValue($s_seven);
        $s_eight_val = $this->getOrdinaryWeightValue($s_eight);
        $s_nine_val = $this->getOrdinaryWeightValue($s_nine);
        $s_ten_val = $this->getOrdinaryWeightValue($s_ten);
        
        return $s_one_val+$s_two_val+$s_three_val+$s_four_val+$s_five_val+$s_six_val+$s_seven_val+$s_eight_val+$s_nine_val+$s_ten_val;
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