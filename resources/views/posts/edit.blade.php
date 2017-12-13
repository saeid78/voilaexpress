@extends('main')

@section('title', '|  Edit Blog ')

@section('stylesheets')

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

  {!! Form::model( $post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
  <div class="col-md-7 col-md-offset-1 ">
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, ["class" => 'form-control  input-lg']) }}

    {{ Form::label('slug', 'Slug:', ["class" => 'form-spacing-top']) }}
    {{ Form::text('slug', null, ["class" => 'form-control  input-lg']) }}

    {{ Form::label('category_id', 'Category:', ["class" => 'form-spacing-top']) }}
    {{ Form::select('category_id', $categories, null, ["class" => 'form-control']) }}

    {{ Form::label('tags', 'Tags', ['class' => 'form-spaicng-top'])}}
    {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

    {{ Form::label('featured_image', 'Update image:', ['class' => 'form-spacing-top'] ) }}
    {{ Form::file('featured_image') }}
    

    {{ Form::label('body', 'Body:', ["class" => 'form-spacing-top'])  }}
    {{ Form::textarea('body', null,  ["class" => 'form-control input-lg']) }}


  </div>


  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt> Create At:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
      </dl>

      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
      </dl>
      <hr>


      <div class="row">
        <div class="col-sm-6">
          {!! Html::linkRoute('posts.show', 'Cancel',  array($post->id), array('class' => 'btn btn-danger btn-block')) !!}

        </div>
        <div class="col-sm-6">
          {{Form::submit('Update', ['class' => 'btn btn-success btn-block' ]) }}

        </div>

      </div>

    </div>
  </div>
  {!! Form::close() !!}
</div>
@endsection

@section ('scripts')

{!! Html::script('js/select2.min.js')!!}

<script type="text/javascript">
  $('.select2-multi').select2();

</script>
@endsection
