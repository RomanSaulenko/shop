<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div  class="admin d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="sidebar-header p-2">
                    <h3>{{ config('app.name', 'Laravel') }}</h3>
                </div>

                <ul class="p-2">
                    <li>
                        <a class="p-1" href="{{route('admin.user.index')}}">{{__('user.Clients')}}</a>
                    </li>
                </ul>
            </nav>
            <div id="content" class="flex-grow-1">

                @yield('content')
            </div>
        </div>


    </div>

    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>
