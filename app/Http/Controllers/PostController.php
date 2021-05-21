<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index() {
       
        $posts = DB::table('posts')                 
                 ->leftJoin('users', 'posts.user_id', '=', 'users.id')                 
                 ->select('posts.id', 'posts.titulo', 'posts.slug', 'posts.user_id', 'posts.created_at', 'posts.updated_at', 'users.name as usuario')
                 ->orderBy('updated_at')                        
                 ->get();
                 
        return view('listPost', ['posts'=>$posts]);
    }

    public function create() {        

        $users = User::orderBy('name')->get();

        return view('viewPost', ['users'=> $users]);
    }

    public function show(int $postid) {
        $users = User::orderBy('name')->get();    
        $post  = Post::where('id', $postid)->get();

        return view('viewPost', ['users'=> $users, 'post'=>$post]);
    }

    public function edit(Int $postid) {
        
        $users = User::orderBy('name')->get();    
        $post  = Post::where('id', $postid)->get();

        return view('viewPost', ['users'=> $users, 'post'=>$post]);
    }

    public function store(Request $request) {
        $post = new Post();    
        $post->titulo  = $request->input('titulo');
        $post->user_id = $request->input('user_id');
        $post->post    = $request->input('content');
        $post->save();
        return redirect()->route('post.index');
    }

    public function update(int $postid, Request $request) {
        $post          = Post::find($postid, ['id']);
        $post->titulo  = $request->input('titulo');
        $post->user_id = $request->input('user_id');
        $post->post    = $request->input('content');
        
        $post->save();

        return redirect()->route('post.index');
    }

    public function destroy(int $postid) {
        $post          = Post::find($postid, ['id']);
        $post->delete();

        return redirect()->route('post.index');
    }

    public function joinPost(Post $post) {
        echo "<b>Post:</b> {$post->titulo}";
        
        $categories = $post->categories()->get();
        //dd($categories);
        if ($categories) {
            echo "<h1>Lista de categorias</h1>";
            foreach($categories as $categorie) {
                echo "<p>{$categorie->descricao}</p>";
            }
        }
        else
          echo 'Sem categoria definida';
    }
}
