@extends('main')

@section('title', '| E-Commerce')
 {{ Html::style('css/style.css') }}
@section('content')
     <div class="container margin-b1">
         <h1 class="text-center"><strong>E-Commerce</strong></h1>
       <div class="row   well">


         <div class="col-md-6 ">


              <h3><strong>Why E-commerce: </strong></h3>
              <br>
              <h3>1- Reflect your brand.</h3>
              <br>
              <h3> 2- Be easy for people to navigate.</h3>
              <br>
              <h3> 3- Make it easy for people to buy.</h3>
              <br>
              <h3>4- Encourage people to spend money.</h3>
              </br>
              <h3> 5- Reward engagement.</h3>
          </div>
          <div class="col-md-4 col-md-offset-1">

                   <img src=" {{ asset('images/ecommerce.jpg') }}" width="300" height="400" class="thumb" alt="a picture">

          </div>
        </div>

      </div>








     </div>
     @endsection


 </body>
</html>
