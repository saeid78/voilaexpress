 @extends('main')

@section('title', '| Home page')

  {{ Html::style('css/styles1.css') }}
 @section('content')

            <div class="row">
              <div class="col-md-12">
                <div class="title" >
                  <span> Only One Step to expand your bussiness!</span>


                </div>
              </div>
            </div>
            <div class="road2">

              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <div class="top-body">
                    <a href=" {{ url('ecommerce') }}" class="btn btn-success btn-lg click "> Lets get Started!</a>
                  </div>
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








</html>
