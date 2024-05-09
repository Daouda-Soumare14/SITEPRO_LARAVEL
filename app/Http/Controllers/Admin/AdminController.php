<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormPostRequest;

class AdminController extends Controller
{
    public function create()
    {
        $post = new Post();
        return view('admin.create', compact('post'));
    }

    public function store(FormPostRequest $request)
    {
        $post = Post::create($request->validated());

        return redirect()->route('admin.index')->with('success', "l'article a bien été creer avec succes");
    }

    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($request->validated());

        return redirect()->route('admin.index')->with('success', "l'article a bien été modifé avec succes");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/admin')->with('success', "L'article a été supprimer avec succes");
    }


    public function index(Request $request)
    {
        $posts = Post::query();

        if ($search = $request->search) {
            $posts->where('title', 'LIKE', '%'. $search .'%')
            ->orWhere('content', 'LIKE', '%'. $search .'%');
        }
        // $posts = (new Post())->all();
        $posts = $posts->latest()->paginate(7);

        return view('admin.index', compact('posts'));
    }
}
