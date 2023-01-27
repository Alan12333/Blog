@extends("layout/footer")
@extends("layout/nav")

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | Josys</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    @vite(["resources/js/general/script.js","resources/css/general/gen.scss"])
</head>
<style>
  .img-banner
  {
      width: 100%;
      height: 75vh;
      object-fit: cover;
  }
</style>
<body>
    @section('nav')
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" data-bind="foreach: blogs">
          <div class="carousel-item active" >
            <img data-bind="attr:{src: $data.img}" class="img-banner" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 data-bind="text: $data.name"></h5>
              <p data-bind="text: $data.body"></p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="cont-blog" data-bind="foreach: lastb">
        <div class="card-blog" >
            <img data-bind="attr:{src: $data.img}" alt="">
            <div class="text-content">
                <h5 data-bind="text: $data.name"></h5>
                <p data-bind="text: $data.body"></p>
            </div>
            <button type="button" class="btn btn-primary btn-sm"><a href="" class=" text-decoration-none text-white" data-bind="attr: { href: /post-name/ + $data.slug}">Read</a></button>
        </div>
      </div>
    @endsection
    
    @section("footer")
      
    @endsection
</body>
</html>