<!DOCTYPE html>
<html lang=en>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>@yield('title')</title>
   <link href="https://fonts.googleapis.com/css?family=Raleway:500,600" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="{{ URL::to('css/bootstrap.css') }}" />
   <link rel="stylesheet" href="{{ URL::to('css/bootstrap-datepicker.css') }}" />
   <link rel="stylesheet" href="{{ URL::to('css/app.css') }}" />
   <link rel="stylesheet" href="{{ URL::to('css/main.css') }}" />
</head>
<body>
   @include('includes.header')
   <div class="container">
      @yield('content')
   </div>
</div>

<script>
var token = '{{ Session::token() }}';
</script>

<script src="{{ URL::to('js/jquery.js') }}"></script>
<script src="{{ URL::to('js/bootstrap.js') }}"></script>
<script src="{{ URL::to('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::to('js/main.js') }}"></script>
@yield('js')
</body>
</html>
