<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="author" content="David Luis">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="{!! asset('images/favicon.ico') !!}">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{!! asset('styles/styles.css') !!}">
        <script type="text/javascript" async src="{!! asset('scripts/scripts.js') !!}"></script>
        @yield('head')
    </head>
    <body>

        <div class="structure">

            <div class="container-body">
                <div class="container-form">
                    <form id="form" class="form" method="POST" accept-charset="UTF-8">
                        @yield('content')
                        <div class="poweredBy">Powered by <span>David Luis</span></div>
                    </form>
                </div>
            </div>

            <div id="loading" class="container-loading"></div>

        </div>

    </body>
</html>