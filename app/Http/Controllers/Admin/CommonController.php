<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller{

    public function download(Request $request){
        return response()->download($_SERVER['SERVER_NAME'].'/'.$request->get('path'));
        //return response()->download($_SERVER['SERVER_NAME'].'/'.$request->get('path'), $request->get('name'));
    }

}
