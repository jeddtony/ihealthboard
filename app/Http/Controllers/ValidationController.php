<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    //

    public static function cleanInput($inputString){
//        $inputString = preg_replace('/&lt;script&gt;(.*)?&lt;\/script&gt;/im', "", $inputString);
//        $inputString = preg_replace('/&lt;?php(.*)?\?&gt;/im', "", $inputString);
        return $inputString;
    }
}
