<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Category;
use App\Tag;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{

  public function __construct() {

    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $posts = Post::orderBy('id', 'desc')->paginate(2);
         return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      $tags = tag::all();
      return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
      //validate data
         $this->validate($request, array(

              "title"        => 'required|max:255',
              "slug"         => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
              "category_id"  => 'required|integer',
              "body"         => 'required',
              'featured_image' => 'sometimes|image'

         ))  ;

          // save in DB
          $post = new Post;
          $post->title = $request->title;
          $post->slug = $request->slug;
          $post->category_id = $request->category_id;
          $post->body = Purifier::clean($request->body);


          // save our image in the post form
          if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            // name unique file name all pcntl_sigprocmask by using timestamp()
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(400, 400)->save($location);

            $post->image = $filename;

          }

          $post->save();

          //adding tags to the post via sync()
          $post->tags()->Sync($request->tags, false);

          // To dispaly message
          Session::flash('success', 'The blog has been successfuly saved');

          // Redirect user to show page which contains all posts

          return redirect()->route('posts.show', $post->id);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $post = Post::find($id);
          return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //find the post in the DB and save as a var
         $post = Post::find($id);
         $categories = Category::all(); // $categories represents all of the objects here from Category Model/table

         $cats = array();
         foreach ($categories as $category) {
           $cats[$category->id] = $category->name;
         }
         $tags = Tag::all();
         $tags2= array();
         foreach ($tags as $tag) {
           $tags2[$tag->id] = $tag->name;
         }
         //return the view and pass in the var we previously created

          return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
    // Validate the data
    $post = Post::find($id);

    /*if ($request->input('slug') == $post->slug) {
      $this->validate($request, array(
           "title" => 'required|max:255',
           'category_id' => 'required|integer',
           'body' => 'required'
      ))  ;
    } else {*/
      $this->validate($request, array(
           "title" => 'required|max:255',
           "slug" => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
           "category_id" => 'required|integer',
           'body' => 'required',
           'featured_image' => 'image'

         )) ;

       // save in DB

       $post = Post::find($id);

       $post->title = $request->input('title');
       $post->slug = $request->input('slug');
       $post->category_id = $request->input('category_id');
       $post->body = Purifier::clean($request->input('body'));

       if($request->hasFile('featured_image')) {

         // add new photo
         $image = $request->file('featured_image');
         // name unique file name all pcntl_sigprocmask by using timestamp()
         $filename = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('images/' . $filename);
         Image::make($image)->resize(800, 400)->save($location);
         $oldFilename = $post->image;

         //update the DB
         $post->image = $filename;
          //delete the old photo
          Storage::delete($oldFilename);
       }
       $post->save();

       //if (isset($request->tags)) {
          //$post->tags()->sync($request->tags);
      // }else {
          //$post->tags()->sync(array());
       //}

       $post->tags()->sync($request->tags);

       // To dispaly message
       Session::flash('success', 'The blog has been successfuly updated!');

       // redirect with flash data to posts.show
       return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the post from it's id to be deleted
       $post = Post::find($id);

       //to detach tags  from the resource which is  (post) is deleted!
       $post->tags()->detach();
       //delete img when deleting a post
       Storage::delete($post->image);

       $post->delete();

       // To dispaly message
       Session::flash('success', 'The blog has been successfuly deleted!');

       return redirect()->route('posts.index');
    }
}
