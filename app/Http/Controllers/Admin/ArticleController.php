<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        if ($request->ajax()) {
            $data = array();
            $data['draw']   = $request->get('draw');
            $start          = $request->get('start');
            $length         = $request->get('length');
            $order          = $request->get('order');
            $columns        = $request->get('columns');
            $search         = $request->get('search');
            $data['recordsTotal'] = Article::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Article::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('author', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Article::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('author', 'like', '%' . $search['value'] . '%');
                })
                    ->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {
                $data['recordsFiltered'] = Article::count();
                $data['data'] = Article::
                skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }
            return response()->json($data);
        }
        return view('admin.article.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article    = new Article();
        $user       = \Auth::user();
        $article->fields['user_id']      = $user->id;
        $data = [];
        foreach ($article->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.article.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request){
        $article = new Article();
        foreach (array_keys($article->fields) as $field) {
            $article->$field = $request->get($field);
        }
        $article->save();
        return redirect('/admin/article')->withSuccess('添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $article   = Article::find((int)$id);
        if (!$article) return redirect('/admin/article')->withErrors("找不到该文章!");
        foreach (array_keys($article->fields) as $field) {
            $data[$field] = old($field, $article->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $article   = Article::find((int)$id);
        foreach (array_keys($article->fields) as $field) {
            $article->$field = $request->get($field);
        }
        $article->save();
        return redirect('/admin/article')->withSuccess('修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $article = Article::find((int)$id);
        if ($article) {
            $article->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }
        return redirect()->back()->withSuccess("删除成功");
    }
}
