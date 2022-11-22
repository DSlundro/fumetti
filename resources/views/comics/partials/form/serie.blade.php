<div class="mb-6">
    <label for="serie_id" class="label">Serie</label>
    <select name="serie_id" class="input">
        <option value="0" selected disabled></option>
        @foreach ($series as $serie)
            <option 
                id="{{ $serie->id }}" 
                value="{{ $serie->id }}" 
                class="input" 
                required 

                @if (isset($comic->serie_id) && $serie->id == $comic->serie_id)
                    selected
                @endif
            >
                {{ $serie->name }}
            </option>
            
        @endforeach
        </select>
    @error('serie_id')
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