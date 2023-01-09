<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bemo Kanban Board</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href={{ mix('/css/app.css')}} />

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased" >
        <div class="text-center app-heading">
            <h3>Bemo Kanban Board</h3>
        </div>
        <div id="app">
            <board-component />
        </div>
        <script src={{ mix('/js/app.js')}}></script>
    </body>
</html>

