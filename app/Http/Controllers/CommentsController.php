<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' => 'store']);
  }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request, $post_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
      //validate all therequest "Form data"
      $this->validate($request, array(
        "email" => "required|max:255",
        "name" => "required|max:255",
        "comment" => "required|min:5|max:2000"
      ));


      // parse Model

         $comment = new Comment();
         $comment->email = $request->email;
         $comment->name = $request->name;
         $comment->comment = $request->comment;
         $comment->approved = true;

         //get post object
         $post = Post::find($post_id);
         //assocaite comment with our post table
         $comment->post()->associate($post);

         $comment->save();


         Session::flash('success', 'Comment was added!');

        return redirect()->route('blog.singlepost', [$post->slug]);



    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $comment = Comment::find($id);
         return view('comments.edit')->withComment($comment);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $this->validate($request, array(


         'comment'  => 'required'
       ));

       $comment =   Comment::find($id);

       $comment->comment = $request->input('comment');

       $comment->save();

       Session::flash('success', 'Comment updated');

       return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id)
    {
      $comment = Comment::find($id);
      return view('comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success', 'Comment has been deleted!');

       return redirect()->route('posts.show', $post_id);
    }
}
