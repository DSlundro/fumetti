@extends('dashboard')

@section('comics')

<h2 class="text-2xl text-center py-5 font-bold">Add new comic</h2>
<form class="w-[500px] m-auto" action="{{ route('comics.update', $comic->id) }}" method="POST">
    @csrf
    @method("PUT")

    {{-- TITLE --}}
    <div class="mb-6">
        <label for="title" class="label">Title</label>
        <input type="text" name="title" id="title" class="input" value="{{ $comic->title }}"  required>
    </div>

    {{-- SERIE --}}
    <div class="mb-6">
        <label for="serie" class="label">Serie</label>
        <input type="text" name="serie" id="serie" class="input" value="{{ $comic->serie }}" required>
    </div>

    {{-- IMAGE --}}
    <div class="mb-6">
        <label for="cover" class="label">Cover</label>
        <input type="text" name="cover" id="cover" class="input" value="{{ $comic->cover }}" required>
    </div>

    {{-- DESCRIPTION --}}
    <div class="mb-6">
        <label for="description" class="label">Description</label>
        <textarea name="description" name="description" id="description" cols="50" rows="4" class="input">{{$comic->title}}
        </textarea>
    </div>

    <button type="submit" class="submit">Submit</button>
</form>

@endsection