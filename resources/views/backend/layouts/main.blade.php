<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">
    <!-- Application Theme Style -->
    <link href="{{elixir('css/backend.css')}}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>

</head>

<body class="nav-md">
    <div class="container body" >
        <div class="main_container" id="app" >

            @include('backend/includes/sidebar')

            @include('backend/includes/topbar')

            @if (isset($vueView))
                <component is="{{$vueView}}" inline-template>
                    <div>
                        @yield('content')
                    </div>
                </component>
            @else
                @yield('content')
            @endif

            @include('backend/includes/footer')
        </div>
    </div>

    <script src="{{ elixir('js/backend-scripts.js') }}"></script>

    @stack('scripts')

</body>