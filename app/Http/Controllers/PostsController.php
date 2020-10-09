<?php

namespace App\Http\Controllers;

/* use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; */

use Illuminate\Support\Facades\DB;
/* use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller; */

//use DB;

use App\Titel;

class PostsController extends Controller
{
    public function show($titel)
    {
        //$post = DB::table('buecher')->where('titel', 'Uns gehts ja noch gold')->first();
        //$post = DB::table('buecher')->where('titel', $titel)->first();
        $post = Titel::where('titel', $titel)->firstOrFail();
        //dd($post);
        /* $posts = [
            'foo' => 'bar',
            'name' => 'hzghzgzgzg'
        ]; */
        /* if (!array_key_exists($post, $posts)) {
            abort(404, 'Sorry kein passender Arrayeintrag da!');
        } */
        /* if (!$post) {
            abort(404);
        } */
        return view('post', [
            //'post' => $posts[$post]
            'post' => $post
        ]);
    }
}
