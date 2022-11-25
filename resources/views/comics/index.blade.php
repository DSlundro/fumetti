@extends('dashboard')

@section('comics')


<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-center text-white-500 dark:text-white-400">
        @include('comics.partials.table.thead')
        @foreach (Auth::user()->comics as $comic)
            @include('comics.partials.table.tbody')
        @endforeach
    </table>
</div>
@endsection
