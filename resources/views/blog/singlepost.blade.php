@extends('main')

@section('title',  "| $post->title" )

@section('content')



<div class="row"> <!-- for emmet (.row>col-md-8) and then ctrl+e -->

      <div class="col-md-8 col-md-offset-2">

        <h1>{{ $post->title}}</h1>
        <p>{!! $post->body!!}</p>
          <img src="{{ asset('images/'. $post->image) }}" height="200" width="200" />
        <hr>
        <h4> Posted In: {{ $post->category->name }}   </h4>



    </div>
</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h3 class="comments-title"> <span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments </h3>
    @foreach ($post->comments  as $comment)
    <div class="comment">
      <div class="author-info">
        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) ."?s=50&d=mm"  }}" class="author-image">
        <div class="author-name">
        <h4>  {{ $comment->name}} </h4>
        <p class="author-time">  {{ date('F jS, Y - g:iA' ,strtotime($comment->created_at)) }} </p>
        </div>

      </div>

      <div class="comment-content">
          {{ $comment->comment}}
      </div>


    </div>

    @endforeach
  </div>
</div>
<div class="row">
  <div id="comment-form" class="col-md-8 col-md-offset-2">
        <h2>  Comments </h2>

    {{ Form::open(['route' =>  ['comments.store', $post->id],  'method' => 'POST']) }}

  <div class="row">
    <div class="col-md-6  ">
      {{ Form::label('name', 'Name:') }}
      {{ Form::text('name', null, array ('class' => 'form-control')) }}
    </div>


    <div class="col-md-6  ">
      {{ Form::label('email', 'Email:') }}
      {{ Form::text('email', null, array ('class' => 'form-control')) }}
    </div>
    <div class="col-md-12  ">
      {{ Form::label('comment', 'Comment:') }}
      {{ Form::textarea('comment', null, array ('class' => 'form-control', 'rows' => '5')) }}
    </div>
  </div>


  <div class="col-md-6 col-md-offset-3">
    {{Form::submit('Create', array('class' => 'btn btn-success btn-block  form-spacing-top')) }}

  </div>



    {{ Form::close() }}
  </div>
</div>


@endsection
