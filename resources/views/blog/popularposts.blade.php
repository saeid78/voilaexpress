@extends('main')

@section('title', '| Popular Posts')

@section('content')

  <div class="row">
    <div class="col-md-8">

      <h1 class="text-center" >Popular Posts</h1>
      @foreach($popularposts as $post)

      <div class="post">

          <h2>  {{   $post->title }} <h2>




            <h5>Published:  {{ date('M j, Y', strtotime($post->created_at)) }}</h5>



             <p> {{  substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : ""}} </p>

               <a href="{{ url('blog/'. $post->slug) }}" class="btn btn-primary" >Read more </a>
      </div>


      @endforeach

    </div>
  </div>
   
@endsection
