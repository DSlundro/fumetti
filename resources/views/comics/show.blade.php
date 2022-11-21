@extends('dashboard')

@section('comics')

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
    {{-- IMAGE --}}
    <img class="rounded-t-lg w-full aspect-square" src="{{$comic->cover}}" alt="" />
    <div class="p-5">
        {{-- TITLE --}}
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{$comic->title}}
        </h5>
        {{-- SERIE --}}
        <h5 class="mb-2 text-xl font-normal tracking-tight text-gray-900 dark:text-white"">
            Serie: {{$comic->serie}}
        </h5>
        {{-- DESCRIPTION --}}
        <p class="py-3 font-normal text-gray-700 dark:text-gray-400">
            Description: {{mb_strimwidth($comic->description,0,30, '...')}}
        </p>
        <div class="flex gap-3 justify-center pt-4">
            {{-- EDIT --}}
            <a href="{{ route('comics.edit', $comic->id) }}" class="edit">
                Edit
            </a>
            {{-- DELETE --}}
            <form method="POST" action="{{ route('comics.show', $comic->id) }}" class="m-0 p-0">
                @method('DELETE')
                @csrf
                
                <button type="submit" class="delete"
                    onclick="return confirm(&quot;Confirm delete?&quot;)">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>


@endsection