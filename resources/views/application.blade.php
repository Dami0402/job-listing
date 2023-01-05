<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $application->name }}</title>
</head>
<body>
  @extends('layouts.app')
  @section('content')
    <form class=" d-flex justify-content-center flex-column rounded vh">
        <div class="grey-background container rounded">
    <h1 class="display-4 exo font-white p-4 mx-auto">{{ $application->name }}</h1>
    <div class="d-flex flex-column p-4 mx-auto">
        <div class="lead font-white mt-4 exo"><span class="text-primary">Email address: </span> {{ $application->email }}</div>
        <div class="lead font-white mt-4 exo"><span class="text-primary">Phone number: </span> {{$application->number}}</div>
        <div class="lead font-white mt-4 exo"><span class="text-primary">Resume: </span> {{$application->resume}}</div>
    </div>
    <a href="{{ url()->previous() }}" class="exo btn btn-lg btn-secondary rounded m-4">Return</a>
</div>
</form>
</body>
@endsection
</html>