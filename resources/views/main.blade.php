<!DOCTYPE html>
<html lang="en">
<head>
@include('partials._head')
<!-- Goggle analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-102724954-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- google Captcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

  <body>

    @include('partials._nav')

      <div class="container">

        @include('partials._messages')

      <!--  {{ Auth::check() ? "Logged in" : "Logged out"}} -->

         @yield('content')





       





      </div>


      @include('partials._javascript')

      @yield('scripts')

       @include('partials._footer')
  </body>
</html>
