@extends('dashboard')

@section('comics')


<div class="overflow-x-auto relative">

    <div class="flex  pb-6">
        <p>Total Comics: {{count($comics)}}</p>
    </div>

    <table class="w-full text-sm text-left text-white-500 dark:text-white-400">
        <thead class="text-xs text-white-700 uppercase bg-gray-50 ">
        
            <tr>
                <th scope="col" class="py-3 px-6">
                    ID
                </th>
                <th scope="col" class="py-3 px-6">
                    Cover
                </th>
                <th scope="col" class="py-3 px-6">
                    Title
                </th>
                <th scope="col" class="py-3 px-6">
                    Serie
                </th>
                <th scope="col" class="py-3 px-6">
                    Description
                </th>
                <th scope="col" class="py-3 px-6">
                    Actions
                </th>
            </tr>
        </thead>
        @foreach ($comics as $comic)
            @include('comics.partials.table.tbody')
        @endforeach
    </table>
</div>
@endsection
