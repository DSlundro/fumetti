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
        <td class="py-4 px-6 flex flex-col justify-center text-center gap-2">
            {{-- SHOW --}}
            <a href="{{ route('comics.show', $comic->id) }}" class="show">
                Show
            </a>
            {{-- EDIT --}}
            <a href="{{ route('comics.edit', $comic->id) }}" class="edit">
                Edit
            </a>
            {{-- DELETE --}}
            <form method="POST" action="{{ route('comics.show', $comic->id) }}">
                @method('DELETE')
                @csrf
                
                <button type="submit" class="delete "onclick="return confirm(&quot;Confirm delete?&quot;)">
                    Delete
                </button>
            </form>
        </td>
    </tr>

</tbody>