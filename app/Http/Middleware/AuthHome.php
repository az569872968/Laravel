<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Illuminate\Support\Facades\Session;
use Closure;

class AuthHome
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('user')){
            return redirect('/');
        }
        $user_id    = Session::get('user')->id;
        $search     = '';
        if( isset($_GET['search']) && !empty($_GET['search'])){
            $search           = $request->get('search');
        }
        if( !empty($search) ){
            $list   = Project::where(function ($query) use ($search,$user_id) {
                $query->where('project_name', 'LIKE', '%' . $search. '%')
                    ->where('user_id', 'LIKE', '%,'.$user_id.',%');
            })->paginate(15);
        }else{
            $list   = Project::where('user_id', 'LIKE', '%,'.$user_id.',%')->paginate(15);
        }
        view()->share('project',$list);
        return $next($request);
    }
}
