<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class BlogController extends Controller
{
    public function index(Request $request){
        $data = true;

    	return Post::published()->status('publish')->paginate(10);
    }
}
