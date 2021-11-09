<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vue Stocks</title>

        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>

    <body>

        <div id="app">

            <app-header></app-header>

            <div class="container">
                <!-- Inactive components will be cached! -->
                <keep-alive>
                    <component v-bind:is="currentTab"></component>
                </keep-alive>
            </div>

        </div>

    </body>

    <script src="{{asset('js/app.js')}}"></script>

</html>
