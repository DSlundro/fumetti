@extends('dashboard')

@section('comics')

<h2 class="text-2xl text-center py-5 font-bold">Add new comic</h2>
<form class="w-[500px] m-auto" action="{{ route('comics.update', $comic->id) }}" method="POST">
    @csrf
    @method("PUT")


    {{-- TITLE --}}
    <div class="mb-6">
        <label for="title" class="label">Title</label>
        <input type="text" name="title" id="title" class="input" value="{{ $comic->title }}"  >
        @error('title')
            <div id="alert-2" class="flex p-1 mt-1 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd">
                    </path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                    {{$message}}.
                </div>
            </div>
        @enderror
    </div>



    {{-- SERIE --}}
    <div class="mb-6">
        <label for="serie" class="label">Serie</label>
        <input type="text" name="serie" id="serie" class="input" value="{{ $comic->serie }}" required>
        @error('serie')
            <div id="alert-2" class="flex p-1 mt-1 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd">
                    </path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                    {{$message}}.
                </div>
            </div>
        @enderror
    </div>



    {{-- IMAGE --}}
    <div class="mb-6">
        <label for="cover" class="label">Cover</label>
        <input type="text" name="cover" id="cover" class="input" value="{{ $comic->cover }}">
        @error('cover')
            <div id="alert-2" class="flex p-1 mt-1 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert" required>
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd">
                    </path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                    {{$message}}.
                </div>
            </div>
        @enderror
    </div>



    {{-- DESCRIPTION --}}
    <div class="mb-6">
        <label for="description" class="label">Description</label>
        <textarea name="description" name="description" id="description" cols="50" rows="4" class="input" required>{{$comic->title}}</textarea>
        @error('description')
            <div id="alert-2" class="flex p-1 mt-1 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd">
                    </path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                    {{$message}}.
                </div>
            </div>
        @enderror
    </div>



    <button type="submit" class="submit">Submit</button>
</form>

@endsection