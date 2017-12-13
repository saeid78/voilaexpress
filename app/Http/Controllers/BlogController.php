<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

    public function getIndex(){
      $posts = Post::orderBy('created_at', 'desc')->paginate(4);
      return View('blog.blogs')->withPosts($posts);


    }

    public function getPopularposts(){
      $popularposts = Post::get()->sortByDesc('view_count');
      /*Post::orderBy('view_count', 'DESC')->take(5);*/
      return View('blog.popularposts')->withPopularposts($popularposts);
    }



    public function getSingle($slug) {
      // fetch from the DB based on slug
      $post = Post::where('slug', '=', $slug)->first();
      // return the view and pass in the post object

      return View('blog.singlepost')->withPost($post);
    }
}
