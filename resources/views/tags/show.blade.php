@extends('main')

@section('title', "| $tag->name  Tag")

@section('content')

  <div class="row">
    <div class="col-md-8">
 <h1> {{ $tag->name}} Tag  </h1>
    </div>


      <div class="col-md-4">
        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">Edit</a>
      </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>title</th>
            <th>Tags</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
        <p> All the post along with tag go here
       </tbody>
     </table>
    </div>
  </div>




@endsection
