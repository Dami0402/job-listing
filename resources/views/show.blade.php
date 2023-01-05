<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;700&family=Michroma&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="{{ asset('custom.css') }}" rel="stylesheet" type="text/css">
    <title>{{ $advert->title }}</title>
</head>
<body>
    <form class=" d-flex justify-content-center flex-column rounded vh">
        <div class="grey-background container rounded">
    <h1 class="display-4 exo font-white p-4 mx-auto">{{ $advert->title }}</h1>
    <div class="d-flex flex-column p-4 mx-auto">
        <div class="lead font-white mt-4 exo"><span class="text-primary">Company name:</span> {{ $advert->name }}</div>
        <div class="lead font-white mt-4 exo"><span class="text-primary">Location:</span> {{$advert->location}}</div>
        <div class="lead font-white mt-4 exo"><span class="text-primary">Phone number:</span> {{$advert->number}}</div>
        <div class="lead font-white mt-4 exo"><span class="text-primary">Job description:</span> {{$advert->description}}</div>
            @csrf
            <div class="exo btn-group pt-4" role="group">
                @guest
            <a href="{{ route('applications.create', ['id' => $advert->id]) }}" class="exo btn btn-lg btn-primary m-1 rounded mt-3">Apply for the job</a>
            @endguest
            <a href="{{ url()->previous() }}" class="exo btn btn-lg btn-secondary m-1 rounded ml-2 mt-3">Return</a>
            </div>
        </div>
    </div>
    </form>
</body>
</html>