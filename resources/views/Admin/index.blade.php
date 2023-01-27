<!DOCTYPE html>
@extends("layout/template")
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @vite(["resources/js/general/gen.js","resources/css/Admin/Admin.scss"])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>

<body>
    @section("content")
    <div class="wrap">
        <div class="container-blogs">
            <div class="cont-search">
                <div class="divider-screen">
                   
                </div>
                <div class="divider-screen text-end">
                    <input type="search" class="input"  data-bind="value: search, event: { 'keyup': SearchbyName }" placeholder="Buscar">
                    <button class="btnsearch" ><a href="{{ route("post.add") }}" class="text-decoration-none text-white">Add Post</a></button>
                </div>
            </div>
            <div data-bind="foreach: prod" class="cont-blog">
                <div class="card-blog">
                    <img data-bind="attr:{src: $data.img}" alt="">
                    <p data-bind="text: $data.name"></p>
                    <div class="text-content">
                        <p data-bind="text: $data.body"></p>
                    </div>
                    <div style="width: 100%; display:flex;">
                        <a data-bind="attr: {href: '/post-name/' + $data.slug}"><button type="button" class="btn btn-primary w-100">View</button></a>
                        <form data-bind="attr: { action: '/api/post/' + $data.id}" class="w-32" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger w-100"><a >Delete</a></button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @endsection
</body>
</html>



