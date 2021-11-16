<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BLOG LARAVEL | {{$title}}</title>
    <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{ $styles }}
</head>

<body>
    <x-navbar></x-navbar>
    <div class="pt-4">
        {{$slot}}
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>