@extends('main')


@section('title',  '|Categories')




@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">

      <h1>Categories</h1>

        <table class="table">
          <thead>
              <tr>
                <th>#</th>

                <th>Name</th>

              </tr>
          </thead>
          @foreach ($categories as $category)
          <tbody>
            <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
          </tr>
          @endforeach
          </tbody>

        </table>

    </div>

    <div class="col-md-3">
      <div class="well">
        {!! Form::open (['route' => 'categories.store', 'method' => 'POST']) !!}
        <h2> Category</h2>
        {{ Form::label('name', 'Name:') }}
        {{ form::text('name', null, ['calss' => 'form-control' ])}}

        {{ form::submit('Create new Category', ['class' => 'btn btn-primary btn-block form-spacing-top' ])}}


      {!! form::close() !!}
      </div>
    </div>
  </div>

</div>
@endsection
