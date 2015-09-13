<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Latest compiled and minified CSS -->
    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/metisMenu.min.css') !!}
    {!! Html::style('css/admin.css') !!}
    @yield('styles')

</head>
<body>
@include('partials.navbar-principal')

<div id="wrapper">
    <div role="navigation" class="navbar-default sidebar">
        <div class="sidebar-nav navbar-collapse">
            <ul id="menu" class="nav">
                <li>
                    <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User</a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="http://localhost:8000/genero/create"><span class="glyphicon glyphicon-plus"
                                                                                aria-hidden="true"></span>
                                Add</a>
                        </li>
                        <li>
                            <a href="{{route('admin.user.index')}}"><span class="glyphicon glyphicon-th-list"
                                                                         aria-hidden="true"></span></i>
                                Users</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Divition</a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="http://localhost:8000/genero/create"><span class="glyphicon glyphicon-plus"
                                                                                aria-hidden="true"></span>
                                Add</a>
                        </li>
                        <li>
                            <a href="{{route('admin.divition.index')}}"><span class="glyphicon glyphicon-th-list"
                                                                              aria-hidden="true"></span></i>
                                Divitions</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Department</a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="http://localhost:8000/genero/create"><span class="glyphicon glyphicon-plus"
                                                                                aria-hidden="true"></span>
                                Add</a>
                        </li>
                        <li>
                            <a href="{{route('admin.department.index')}}"><span class="glyphicon glyphicon-th-list"
                                                                         aria-hidden="true"></span></i>
                                Departments</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>

</div>
<div id="page-wrapper">
    @include('partials.success-message')
    @include('partials.errors-request')
    @include('partials.errors-request-ajax')
    @include('partials.success-request-ajax')

    @if(Request::segment(1)==='admin' && !Request::segment(2))
        @include('partials.graphics.dashboard-graphics')
    @endif

    @yield('content-admin')
</div>

<!-- Scripts -->
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/metisMenu.min.js') !!}
{!! Html::script('js/highcharts.js') !!}
{!! Html::script('js/exporting.js') !!}
{!! Html::script('js/data.js') !!}
{!! Html::script('js/drilldown.js') !!}
{!! Html::script('js/graphics.js') !!}
@yield('scripts')
</body>
</html>







