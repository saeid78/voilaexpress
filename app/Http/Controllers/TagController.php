<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
use App\Post;

class TagController extends Controller
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
      //grabe all of the the tag
         $tags = Tag::all();

         //dispaly all the tags
         return view('tags.index')->withTags($tags);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
          "name" => 'required|max:255'
            ));
          $tag = new Tag;
          $tag->name = $request->name;
          $tag->save();

          Session::flash('success', 'New tag has been successfuly created!');

          return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $tag = Tag::find($id);
         return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $tag = Tag::find($id);
      return view('tag.edit')->withTag($tag);


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts->detach();

        $tag->delete();

        Session::flash('success', 'The blog has been successfuly deleted!');

        return redirect()->route(tags.index);
    }
}
