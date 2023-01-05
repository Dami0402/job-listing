<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statistics</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header exo blue-background font-white">Job Views</div>
                    <div class="card-body exo grey-background font-white">{{ $views_count }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header exo blue-background font-white">Job applications</div>
                    <div class="card-body exo grey-background font-white">{{ $totalApplications }}</div>
                </div>
            </div>
        </div>
        <a href="{{ route('home') }}" class="exo btn btn-primary btn-lg mt-5 mb-3">Return</a>
    </div>
</body>
@endsection
</html>