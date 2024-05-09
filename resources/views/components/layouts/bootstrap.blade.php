<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
    <div class="container">
        <p class="my-3">
            Tutorial Source 
            <a href="https://laravel-news.com/crud-operations-using-laravel-livewire" target="_blank">
                https://laravel-news.com/crud-operations-using-laravel-livewire
            </a>
        </p>
        <div class="row justify-content-center mt-3">
            {{ $slot }}
        </div>
    </div>
 
    @livewireScripts
  </body>
</html>