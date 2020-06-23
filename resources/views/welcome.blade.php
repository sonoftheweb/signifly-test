<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="My implementation of a test given by Signifly. Author: Jacob Ekanem, Backend - PHP, Frontend - JS, HTML, CSS.">

        <title>Signifly Foosball Tournament</title>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    </head>
    <body>
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
