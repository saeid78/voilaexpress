@extends('main')


@section('title',  '|All Tags')




@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">

      <h1>Tags</h1>

        <table class="table">
          <thead>
              <tr>
                <th>#</th>

                <th>Name</th>

              </tr>
          </thead>
          @foreach ($tags as $tag)
          <tbody>
            <tr>
            <td>{{$tag->id}}</td>
            <td><a href=" {{ route('tags.show', $tag->id) }}">{{ $tag->name }} </a></td>
          </tr>
          @endforeach
          </tbody>

        </table>

    </div>

    <div class="col-md-3">
      <div class="well">
        {!! Form::open (['route' => 'tags.store', 'method' => 'POST']) !!}
        <h2> New Tags</h2>
        {{ Form::label('name', 'Name:') }}
        {{ form::text('name', null, ['calss' => 'form-control' ])}}

        {{ form::submit('Create new Tag', ['class' => 'btn btn-primary btn-block form-spacing-top' ])}}


      {!! form::close() !!}
      </div>
    </div>
  </div>

</div>
@endsection
