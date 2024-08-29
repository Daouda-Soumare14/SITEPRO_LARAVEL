<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
     public function welcome()
     {
          return view('blog.welcome');
     }

     public function index()
     {
          $posts = (new Post())->all();

          return view('blog.index', compact('posts'));
     }

     public function show(int $id)
     {
          $posts = (new Post())->find($id);

          return view('blog.show', compact('posts'));
     }
}
