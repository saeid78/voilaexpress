@extends('main')

@section('title', '| Contact')

 @section('content')



          <div class="row">
            <div class="col-md-12">
               <h1>Contact Us Today!</h1>
               <hr>
               <form action ="{{ url('contact') }}" method ="POST" data-parsley-validate =''>
                 {{ csrf_field() }}

                 <div class="form-group">
                   <label name="email">Email:</lable>
                   <input id="email" name="email" type="email" class="form-control" data-parsley-type="email">
                 </div>

                 <div class="form-group">
                   <label name="subject">Subject:</lable>
                   <input id="subject" name="subject" class="form-control" data-parsley-required>
                 </div>

                 <div class="form-group">
                   <label name="message">Message:</lable>
                   <textarea id="message" name="message" placeholder="Type your message..." class="form-control" data-parsley-required></textarea>
                 </div>
                 <!--  Google Captcha
                 <div class="g-recaptcha" data-sitekey="6LfucykUAAAAAGEAFZbMs7DnoPfs0zbBLcDa5jc1"></div>
                 -->
                 <input type="submit" value="Send Message" class="btn btn-success form-spacing-top">
               </form>
           </div>


      </div>

      @endsection

    @section ('scripts')

    {!! Html::script('js/parsley.min.js')!!}

    @endsection
