@extends('layouts.app')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
</head>
<body>

<div class="container">
    <div class="row" style="margin-top:5px">
        <div class="col-md-6 offset-md-3">

            <hr>
            @livewire('loginform')
        </div>
    </div>
</div>

@livewireScripts
</body>
</html>
@endsection
