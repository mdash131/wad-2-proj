<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Redirect;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $posts = Posts::where('active',1)->orderBy('created_at')->paginate(2);

        $title = 'Latest Post';

        return view('home')->withPosts($posts)->withTitle($title);
    }

    public function indexDashboard()
    {
        return view('admin/index');
    } 

    public function show($slug)
    {
        $post = Posts::where('slug',$slug)->first();
        if(!$post){
            return redirect('/')->withErrors('requested page not found');
        } 
        $comments = $post->comments;
        return view('posts.show')->withPost($post)->withComments($comments);
    }
    
}
