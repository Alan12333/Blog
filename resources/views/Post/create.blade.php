<!DOCTYPE html>
@extends("layout/template")
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Users</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>

</head>
@vite(["resources/css/Admin/Admin.scss",'resources/js/Admin/users.js'])
<body>
    @section("content")
    <div class="wrap">
        <div class="container-blogs">
            
            <form class="forms" action="{{ route("post.storage") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="fs-3 bold b21 cen">ADD POST</h1>
                <div class="mb-3">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" >
                  </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" >
                  
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Image</label>
                    <input type="text" class="form-control" id="file" name="img" placeholder="Image Url">
                    
                  </div>
                <label for="body" class="form-label">Body</label>

                <textarea id="body" name="body" class="form-control">
                    
                </textarea>
                
                <br><br>
                <button type="submit" class="btn btn-primary w-50">Submit</button>
                
              </form>
        </div>
    </div>
    @endsection
    
</body>
</html>
