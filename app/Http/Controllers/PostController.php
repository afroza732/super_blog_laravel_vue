<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost()
    {
        $allPost = Post::all();
        dd($allPost);
    }
}