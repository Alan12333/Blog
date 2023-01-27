<!DOCTYPE html>
@extends("layout/template")
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Users</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
</head>
@vite(["resources/css/Admin/Admin.scss",'resources/js/Admin/users.js'])
<body>
    @section("content")
    <div class="wrap">
        <div class="container-blogs">
            <form class="forms" method="post" action="{{route("user.put")}}">
                @method("put")
                @csrf
                <h1 class="fs-3 bold b21 cen">ADDUSER</h1>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="hidden" name="id" value="{{$user[0]['id']}}">
                    <input type="text" class="form-control" id="name" name="name"  value="{{$user[0]['name']}}">
                  </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" name="email"  value="{{$user[0]['email']}}">
                  
                </div>
                
                <button  class="btn btn-primary w-50">Submit</button>
              </form>
        </div>
    </div>
    @endsection
    
</body>
</html>