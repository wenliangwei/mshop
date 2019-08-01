<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WenController extends Controller
{
    //
    public function wen(Request $request){
        $data = [
            'name' => '高龙',
            'sex' => '男',
            'age' => 19
        ];
        dd($data);
    }
}
