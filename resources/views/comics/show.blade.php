@extends('dashboard')

@section('comics')
{{-- COMIC --}}
<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md  fixed">
        {{-- IMAGE --}}
        <img class="rounded-t-lg w-full aspect-square" alt="cover" width="100" 
            src="{{ 
                strpos($comic->photos[0]['link'] ?? null, 'http') === 0 
                ? $comic->photos[0]['link'] ?? null 
                : url('photos/'.$comic->photos[0]['link'] ?? null) }}"  
        >
        <div>
            <h3 class="py-2">All photos:</h3>
            <div class="flex w-20">
                @foreach ($comic->photos as $photo)
                    <img class="rounded-t-lg w-full aspect-square" alt="cover" width="100" 
                    src="{{ 
                        strpos($photo->link, 'http') === 0 
                        ? $photo->link 
                        : url('photos/'.$photo->link) }}"  
                    >
                @endforeach
            </div>
        </div>
        <div class="p-5">
        {{-- TITLE --}}
        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">
            {{$comic->title}}
        </h5>
        {{-- SERIE --}}
        <h5 class="mb-2 text-xl font-normal tracking-tight text-gray-900 ">
            Serie: {{$comic->serie->name}}
        </h5>
        {{-- DESCRIPTION --}}
        <p class="py-3 font-normal text-gray-700 ">
            Description: {{mb_strimwidth($comic->description,0,30, '...')}}
        </p>
        @if (Auth::user()->id === $comic->user_id)
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
        @endif
    </div>
</div>

<section class="bg-white  py-8 lg:py-16 flex justify-end">

    <div class="max-w-2xl pl-12 px-4 w-full">

        {{-- NUMBER OF ALL COMMENTS OF COMIC --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussions ({{ count($comments) }})</h2>
        </div>

        {{-- FORM FOR NEW COMMENT --}}
        <form 
            class="mb-6" 
            action="{{ route('comments.store', ['comic_id' => $comic->id]) }}"  
            method="POST"
        >
            @csrf
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                <label for="text" class="sr-only">Your comment</label>
                <textarea id="text" name="text" rows="6"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
                    placeholder="Write a comment..." required>{{ $comment->text ?? old('description') }}</textarea>
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-cente text-white border bg-green-600 rounded-lg">
                Post comment
            </button>
        </form>

        {{-- SHOW ALL COMMENTS ON COMIC ID --}}
        @foreach ($comments as $comment)
            <article class="p-6  text-base bg-white rounded-lg">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900">
                            <img
                                class="mr-2 w-6 h-6 rounded-full border {{ Auth::user()->id === $comment->user_id ? 'bg-green-300' : 'bg-red-300'}}"
                                >{{ ($comment->user->name == Auth::user()->name) ? 'YOU' : $comment->user->name}}
                        </p>
                    </div>
                    <button id="dropdownComment1Button" 
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                        type="button">
                    </button>
                </footer>
                <div class="text-sm text-gray-600 flex gap-12 pb-6">
                    <p class="text-[10px]">
                        Created at: {{ $comment->created_at }}
                    </p>

                    {{-- SHOW MODIFIED DATE IF IT'S DIFFERENT FROM CREATED DATE --}}
                    @if ( $comment->created_at != $comment->updated_at)
                        <p class="text-[10px]">
                            Modified at: {{ $comment->updated_at }}
                        </p>
                    @endif
                </div>

                {{-- SHOW EDIT AREA ONLY IF USER IS LOGGED IN AND OWNER OF COMMENT --}}
                @if (Auth::user() && Auth::user()->id === $comment->user_id)
                    <form 
                        class="flex"
                        action="{{ route('comments.update', $comment->id) }}"
                        method="POST"
                    >
                    @csrf
                    @method("PUT")
                        <div class="py-2 px-4  bg-white rounded-lg rounded-t-lg border border-gray-200 w-full">
                            <textarea id="text" name="text" rows="1"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
                            placeholder="Write a comment..." required>{{ $comment->text ?? old('description') }}</textarea>
                        </div>

                        {{-- EDIT --}}
                        <div class="flex justify-end items-end">
                            <button class="edit !w-28 h-[38px]">Edit</button>
                        </div>
                    </form>
                @else
                    <p class="text-gray-500">{{$comment->text}}</p>
                @endif

                {{-- DELETE COMMENT --}}
                @if (Auth::user() && Auth::user()->id === $comment->user_id)
                    <div class="flex gap-3 justify-end pt-4">
                        {{-- DELETE --}}
                        <form 
                            method="POST" 
                            action="{{ route('comments.destroy', $comment->id) }}" class="m-0 p-0"
                        >
                            @method('DELETE')
                            @csrf
                            
                            <button type="submit" class="delete !w-28"
                                onclick="return confirm(&quot;Confirm delete?&quot;)">
                                Delete
                            </button>
                        </form>

                    </div>
                @endif

            </article>
            <hr>
        @endforeach

    </div>
</section>



@endsection