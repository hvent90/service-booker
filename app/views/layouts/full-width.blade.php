<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/jquery.qtip.min.css" rel="stylesheet">
        {{ HTML::style('css/custom.css'); }}
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
      @if(Auth::user())
        @if($currentUser->id == 100)
          @include('layouts.partials.nav.default')
        @endif
      @endif
      <!-- <div class="container"> -->
      @include('layouts.partials.nav.advisor-dash')

      @yield('content')

      <div class="container">
        @include('layouts.partials.footer')
      </div>
      <!-- </div> -->

      @include('layouts.partials.common-scripts')

      @yield('script')

      <script>
      </script>
    </body>
</html>

