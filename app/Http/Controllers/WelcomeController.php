<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug='')
    {
        $pageTitle = 'Welcome';
        if ( $slug != '' ) {
            $post = Post::where('slug', $slug)->first();
            $pageTitle = $post->title;
            return view('posts.show', compact('post', 'pageTitle'));
        }
        $posts = Post::orderBy('updated_at', 'desc')->paginate(3);

        return view('welcome', compact('posts', 'pageTitle'));
    }
}