 @extends('main')

@section('title', '| About')

  {{ Html::style('css/style.css') }}
@section('content')
      <div class="container">
        <div class="row">
          <div class="col-md-12 title">
            <h1>Voila Express</h1>
          </div>
        </div>
        <div class="row margin-b">
          <div class="col-md-8 blog-main btn-h1-spacing">
            <div class="blog-post">
              <div class="well">
                 <h2>Who we are? </h2>
                 <p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
               <h2>What are our missions? </h2>
               <p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
          <div class="col-md-4 blog-sidebar">
              <h1>Ads</h1>
              <img src="{{asset('images/road1.jpeg') }}" width="300" height="400" alt:"Saeid Rahmani"/>

          </div>
        </div>
      </div>
      @endsection


  </body>
</html>
