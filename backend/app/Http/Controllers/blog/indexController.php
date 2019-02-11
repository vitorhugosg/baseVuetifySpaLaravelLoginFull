<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class indexController extends Controller
{
    public function index(Request $request){
        $data = true;
        
    	return Post::published()->status('publish')->paginate(10);
    }
}
