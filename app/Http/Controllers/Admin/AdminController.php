<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function create()
    {
        $post = new Post();
        return view('admin.create', compact('post'));
    }

    public function store(FormPostRequest $request)
    {
        Post::create($this->extractDate($request, new Post()));

        return redirect()->route('admin.index')->with('success', "l'article a bien été creer avec succes");
    }

    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    public function update(Post $post, FormPostRequest $request)
    {
        $post->update($this->extractDate($request, $post));

        return redirect()->route('admin.index')->with('success', "l'article a bien été modifé avec succes");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/admin')->with('success', "L'article a été supprimer avec succes");
    }

    private function extractDate(FormPostRequest $request, Post $post) : array
    {
        $data = $request->validated();

        /** @var UploadedFile|null $image */
        $image = $request->validated('image');

        if (!$image || !$image->isValid()) {
            return $data;
        }

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $data['image'] = $image->store('blog', 'public');
        return $data;
    }


    public function index(Request $request)
    {
        // User::create([
        //     'name' => 'daouda',
        //     'email' => 'daoudasoum14@gmail.com',
        //     'password' => Hash::make('soumare')
        // ]);
        $posts = Post::query();

        if ($search = $request->search) {
            $posts->where('title', 'LIKE', '%'. $search .'%')
            ->orWhere('content', 'LIKE', '%'. $search .'%');
        }
        
        $posts = $posts->latest()->paginate(7);

        return view('admin.index', compact('posts'));
    }
}
