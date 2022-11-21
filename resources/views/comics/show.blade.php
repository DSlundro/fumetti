@extends('dashboard')

@section('comics')
<link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous"
>

<div class="card">
    <div class="card-body">
        
        <div class="card-body">
            <h1 class="card-title">Title : {{ $comic->title }}</h1>
            <img class="py-4" src="{{$comic->cover}}">
            <h3 class="card-text">Serie : {{ $comic->serie }}</h3>
            <p class="card-text">Description : {{ $comic->description }}</p>
        </div>

        <a href="#" class="font-medium py-1 px-4 rounded-md w-full"
            style="background: green; border: 1px solid black; color: black; margin: 8px 0"
        >Edit</a>
        <a href="#" class="font-medium py-1 px-4 rounded-md w-full"
            style="background: red; border: 1px solid black; color: black;"
        >Delete</a>
    </div>
</div>
@endsection