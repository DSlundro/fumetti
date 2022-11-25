@extends('dashboard')

@section('comics')

<h2 class="form_title">Edit the comic</h2>
<form 
    class="form" 
    action="{{ route('comics.update', $comic->id) }}" 
    enctype="multipart/form-data"
    method="POST">
    @csrf
    @method("PUT")

    {{-- TITLE --}}
    @include('comics.partials.form.title')

    {{-- SERIE --}}
    @include('comics.partials.form.serie')

    {{-- COVER --}}
    @include('comics.partials.form.photo')

    {{-- DESCRIPTION --}}
    @include('comics.partials.form.description')

    {{-- SUBMIT BUTTON --}}
    @include('comics.partials.form.submitButton')
</form>

@endsection