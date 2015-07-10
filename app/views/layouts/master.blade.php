<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>@yield('title') | IDT V2</title>
 
        @include('layouts._styles')
        <style>
            body {
                margin-top: 5%;
            }
        </style>
    </head>
    <body>
        <div class='container-fluid'>
            <div class='row'>
                @yield('content')
            </div>
        </div>

        @include('layouts._scripts')
    </body>
</html>