<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectCreateRequest;
use App\Models\Project;
use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PoxyController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index( Request $request ){
        $data = array();
        $data['draw'] = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $order = $request->get('order');
        $columns = $request->get('columns');
        $search = $request->get('search');
        $data['recordsTotal'] = Project::count();
        $data['list']         = Project::select()->get();
        return view('admin.proxy.index')->with('data',$data);
    }
}
