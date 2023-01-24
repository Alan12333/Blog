<!DOCTYPE html>
@extends("layout/template")
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(["resources/js/app.js","resources/css/app.scss"])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>

<body>
    @section("content")
   

    @endsection
</body>
</html>

