@extends('dashboard')

@section('comics')

<h2 class="form_title">Add new comic</h2>
<form 
    class="form" 
    action="{{ route('comics.index') }}" 
    method="POST">
    @csrf

    {{-- TITLE --}}
    @include('comics.partials.form.title')

    {{-- SERIE --}}
    @include('comics.partials.form.serie')

    {{-- COVER --}}
    @include('comics.partials.form.cover')

    {{-- DESCRIPTION --}}
    @include('comics.partials.form.description')

    {{-- SUBMIT BUTTON --}}
    @include('comics.partials.form.submitButton')
</form>

@endsection