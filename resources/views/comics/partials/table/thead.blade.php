<thead class="text-xs text-white-700 uppercase bg-gray-50 ">
    
    <div class="flex  pb-6">
        <p>Total Comics: {{count(Auth::user()->comics)}}</p>
    </div>

    <tr>
        <th scope="col" class="py-3 px-6">
            ID
        </th>
        <th scope="col" class="py-3 px-6">
            Photos
        </th>
        <th scope="col" class="py-3 px-6">
            Photos count
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