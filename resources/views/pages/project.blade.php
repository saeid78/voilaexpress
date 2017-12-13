 @extends('main')

@section('title', '| Project')
  {{ Html::style('css/style.css') }}
 @section('content')
      <div class="container">
        <div class="row ">
          <div class="col-md-12 title">
            <h1 class="text-center">Projects</h1>
          </div>
        </div>


        <div class="row well">
          <div class="col-md-10 col-md-offset-2 margin-b1 btn1-h1-spacing">

            <img src="{{ asset('images/project1.png') }}" width="200" height="200"/>
            <img src="{{ asset('images/project1.png') }}" width="200" height="200"/>
            <img src="{{ asset('images/project1.png') }}" width="200" height="200"/>


          </div>

        </div>
      </div>
@endsection
<!-- 16:9 aspect ratio -->
<!--
      <div class="embed-responsive embed-responsive-16by9">
       <iframe class="embed-responsive-item" src="<iframe width="560" height="315" src="https://www.youtube.com/embed/AhgtoQIfuQ4" frameborder="0" allowfullscreen></iframe>"></iframe>
      </div>
-->



      </div>
   </body>
</html>
