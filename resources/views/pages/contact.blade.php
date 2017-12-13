@extends('main')

@section('title', '| Contact')
<!--
@section('stylesheets')
  {!! Html::style('css/parsley.css')!!}

@endsection
-->
  {{ Html::style('css/style.css') }}
 @section('content')
<div class="container well">


          <div class="row margin1-b ">
            <div class="col-md-8 col-md-offset-2">
               <h1>Contact Us Today!</h1>
               <hr>
               <form action ="{{ url('contact') }}" method ="POST">
                 {{ csrf_field() }}

                 <div class="form-group">
                   <label name="email">Email:</label>
                   <input id="email" name="email" type="email" class="form-control">
                 </div>

                 <div class="form-group">
                   <label name="subject">Subject:</label>
                   <input id="subject" name="subject" class="form-control">
                 </div>

                 <div class="form-group">
                   <label name="message">Message:</label>
                   <textarea id="message" name="message" placeholder="Type your message..." class="form-control" ></textarea>
                 </div>

                 {!! app('captcha')->display() !!}


                 <input type="submit" value="Send Message" class="btn btn-success form-spacing-top">
               </form>


           </div>


      </div>
  </div>
      @endsection

<!--     @section ('scripts')

    {!! Html::script('js/api.js')!!}

    @endsection
  -->
