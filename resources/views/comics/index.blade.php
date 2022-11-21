@extends('dashboard')

@section('comics')


<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
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
            <tbody>
                <tr class="bg-white border-b ">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                        {{$comic->id}}
                    </th>
                    <td class="py-4 px-6">
                        <img src="{{$comic->cover}}" alt="cover" width="100" >
                    </td>
                    <td class="py-4 px-6">
                        {{$comic->title}}
                    </td>
                    <td class="py-4 px-6">
                        {{$comic->serie}}
                    </td>
                    <td class="py-4 px-6">
                        {{mb_strimwidth($comic->description,0,30, '...')}}
                    </td>
                    <td class="py-4 px-6 flex flex-col text-center">
                        <a href="#" class="font-medium py-1 px-4 rounded-md w-full"
                            style="background: aqua; border: 1px solid black; color: black;"
                        >View</a>
                        <a href="#" class="font-medium py-1 px-4 rounded-md w-full"
                            style="background: green; border: 1px solid black; color: black; margin: 8px 0"
                        >Edit</a>
                        <a href="#" class="font-medium py-1 px-4 rounded-md w-full"
                            style="background: red; border: 1px solid black; color: black;"
                        >Delete</a>
                    </td>
                </tr>
                
            </tbody>
        @endforeach
    </table>
</div>



@endsection
