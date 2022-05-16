<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href={{ URL::asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" href={{ URL::asset('css/app.css') }}>
</head>
<body>
    <div id="main-wrapper">

        <!-- navbar layout -->
        @include('layouts.navbar')

        <!-- content layout -->
        <div class="page-wrapper">
            @yield('content')
        </div>

        <!-- footer layout -->
        @include('layouts.footer')
    </div>

<script src={{ URL::asset("js/jquery.min.js") }}></script>
<script src={{ URL::asset("js/bootstrap.min.js") }}></script>
</body>
</html>