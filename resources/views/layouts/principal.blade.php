<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Latest compiled and minified CSS -->
    {!! Html::style('css/app.css') !!}
    @yield('styles')

</head>
<body>
@include('partials.navbar-principal')

@yield('content')

        <!-- Scripts -->
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
@yield('scripts')
</body>
</html>
