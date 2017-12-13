@extends('main')

@section('title', '| Blog')
  {{ Html::style('css/style.css') }}
@section('content')

     <div class="row">
           <div class="col-md-12">
             <div class="jumbotron">
               <div class="text-center">
                  <h1>Welcome to our Blog! </h1>
                  <p class="lead">Please ready my popular posts!</p>
                  <p><a class="btn btn-primary btn-lg" href="{{ route('blogs.popularposts') }}" role="button"> Popular Post</a></p>
             </div>
           </div>
     </div> <!-- end of header.row -->


       <div class="row">

         <div class="col-md-7 col-md-offset-1">

           @foreach($posts as $post)
           <div class="post">
             <h2>{{ $post->title }}</h2>

             <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

             <p> {{  substr(strip_tags($post->body), 0, 300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : ""}}
             </p>

             <!--<a href=" {{ route('blog.singlepost', $post->id) }}" class="btn btn-primary">Read More</a>-->
            <a href=" {{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
           </div>

           <hr>
             @endforeach
         </div>
         <div class="col-md-3">

             <h2>Sidebar</h2>
             <p>
               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
             </p>

         </div>

       </div>





         <div class="row">
           <div class="col-md-12">
             <div class="text-center">
               {!! $posts->links() !!}
             </div>

           </div>
         </div>
@endsection
