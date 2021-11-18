<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SULTHAN RAFIF | BLOG LARAVEL</title>

        <!-- Bootstrap core CSS -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        
        <!-- Custom styles for this template -->
        <link href="/css/dashboard.css" rel="stylesheet">
    </head>
  <body>
    
    @include('dashboard.layouts.header')

    <div class="container-fluid">
    <div class="row">
        @include('dashboard.layouts.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('container')
        </main>
    </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="dashboard.js"></script>
  </body>
</html>
