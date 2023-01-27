<!DOCTYPE html>
@extends("layout/template")
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Users</title>
</head>
@vite(["resources/css/Admin/Admin.scss",'resources/js/Admin/users.js'])
<body>
    @section("content")
    <div class="wrap">
        <div class="container-blogs">
            <div class="cont-search">
                <div class="divider-screen">
                   
                </div>
                <div class="divider-screen text-end">
                    <button class="btnsearch" ><a href="{{ route("user.add") }}" class="text-decoration-none text-white">Agregar</a></button>
                </div>
            </div>
            <div data-bind="foreach: users" class="cont-blog">
                <div class="user-cont">
                    <div class="w-32 mr-auto">
                        <p class="fs-6 text-bold " data-bind="text: $data.name" style="padding-left:5px;"></p>
                    </div>
                    <div class="w-32 mr-auto">
                        <p class="fs-6 text-bold " data-bind="text: $data.email" style="padding-left:5px;"></p>
                    </div>
                    <div class="w-32 d-flex">
                        <a class="text-white text-decoration-none" data-bind="attr: { href: '/Admin/user/edit/' + $data.id}"><button type="button" class="btn btn-primary w-100" >Edit</button></a>
                        <form data-bind="attr: { action: '/api/user/' + $data.id}" class="w-32" method="POST">
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