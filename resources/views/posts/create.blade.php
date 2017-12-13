@extends('main')

@section('title', '| Create new Post')

@section('stylesheets')
  {!! Html::style('css/parsley.css')!!}
  {!! Html::style('css/select2.min.css')!!}
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'link code',
        menubar: false
    });
  </script>

@endsection

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Create New Post</h1>
    <hr>
    {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true ]) !!}


    {{Form::label('title', 'Title:') }}
    {{Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}
<br>

    {{ Form::label('slug', 'Slug:') }}
    {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255' ) ) }}



    {{ Form::label('category_id', 'Category:') }}
    <select name="category_id" class="form-control">
      @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>

    @endforeach
  </select>


  <!-- Or using form helper-->
      <!--
      {{ Form::label('category_id', 'Category:') }}
      {{Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
    -->

    {{ Form::label('tags', 'Tags:') }}
    <select name="tags[]" class="form-control select2-multi" multiple="multiple">
      @foreach($tags as $tag)
      <option value="{{ $tag->id }}">{{ $tag->name }}</option>

    @endforeach
  </select>

    {{ Form::label('featured_image', 'Upload Featured Image:', array('class' => 'form-spacing-top')) }}
    {{ Form::file('featured_image') }}

    {{Form::label('body', 'Post Body:', array('class' => 'form-spacing-top') ) }}
    {{Form::textarea('body', null, array('class' => 'form-control ')) }}
<br>
    {{ Form::submit('Creat Post', array('class' => 'btn btn-success btn-lg btn-block')) }}

    {!! Form::close() !!}
  </div>
</div>
@endsection

@section ('scripts')

{!! Html::script('js/parsley.min.js')!!}
{!! Html::script('js/select2.min.js')!!}

    <script type="text/javascript">
    $('.select2-multi').select2();
    </script>

@endsection
