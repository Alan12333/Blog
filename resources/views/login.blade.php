
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.scss'])
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>

<body>
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
              class="img-fluid" alt="Phone image">
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form method="POST" action="{{ route('auth.save') }}">
              @csrf
              <div class="form-outline mb-4">
                <input type="email" name="email" value="{{ old("email") }}" class="form-control form-control-lg" placeholder="email"/>
                @error("email")
                    <span style="color:red">{{$message}}</span>
                @enderror
              </div>
              <div class="form-outline mb-2">
                <input type="password" name="password" class="form-control form-control-lg" placeholder="password"/>
              </div>
              <div class="form-outline mb-4">
                <input type="checkbox" id="check" name="check">
                <label role="button" for="check" class="ml-2">Remember me</label>
              </div>
              <button type="submit" class="btn btn-fd btn-primary btn-lg btn-block">
                <i class="fa fa-sign-in"></i>  Sign in
              </button>
            </form> 
          </div>
        </div>
      </div>
    </section>
</body>
</html>