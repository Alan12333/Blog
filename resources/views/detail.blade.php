@extends("layout/footer")
@extends("layout/nav")

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | {{$detail[0]['name']}}</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
    @vite(["resources/js/general/details.js","resources/css/general/det.scss"])
</head>
<body>
    @section('nav')
        @foreach ($detail as $post)
            <img src="{{$post['img']}}" alt="" class="img_banner">
            <div class="content-post">
                <div class="cont-title">
                    <h1 class=" fs-1">{{$post['name']}}</h1>
                    <p class="fs-6 text-gray"><b>Post date:</b> {{$post['created_at']}}</p>
                </div>
                <div class="blog_content">
                    <div class="image_blog_content">
                        <img src="{{$post['img']}}" alt="">
                    </div>
                    <div class="body_content">
                        <p class="">{{$post['body']}}</p>
                    </div>
                </div>
            </div>
            <div class="post_intersted" data-bind="foreach: blogs">
                <div class="card-blog" >
                    <img data-bind="attr:{src:  $data.img}" alt="">
                    <div class="text-content">
                        <h5 data-bind="text: $data.name"></h5>
                        <p data-bind="text: $data.body"></p>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm"><a href="" class=" text-decoration-none text-white" data-bind="attr: { href: /post-name/ + $data.name}">Read</a></button>
                </div>
            </div>

            <div class="cont-100 mt-8 "><br>
                <div class="comments" data-bind="foreach: comments">
                    <div class="comment-content">
                        <div class="w-32 mr-auto">
                            <p class="px12 bold" data-bind="text: $data.email"></p>
                            <p class="px12" data-bind="text: $data.creacion"></p>
                        </div>
                        <div class="cont-50 mr-auto" data-bind="text:$data.comment">
                            <p>Comentario de la persona y el por que lo hizo de esa manera estipulando y queriendo comentar algo mas alla de las cosas</p>
                        </div>
                        @auth
                        <div class="cont-20">
                            <form data-bind="attr: { action: '/api/post/destroycomment/' + $data.id}" method="POST">
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-danger w-100 mt-3">Delete</button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
                <br>
                @auth
                <div class="comments">
                    <form action="{{ route("comment.post") }}" method="POST" class="cont-50">
                        @csrf
                        <input type="hidden" value="{{$post['id']}}" name="post_id">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        <textarea id="editor" name="comment">
                            
                        </textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script><br>
                        <button type="submit" class="btn btn-primary w-50">Submit</button>
                    </form>
                </div>
                @endauth
            </div>
        @endforeach
    @endsection
    @section("footer")
      
    @endsection
</body>