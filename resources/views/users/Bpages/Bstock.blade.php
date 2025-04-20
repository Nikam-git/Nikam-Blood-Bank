@include('users.headers.header-2')
<div class="container mx-auto my-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-3xl font-bold text-red-700 text-center mb-6">Available Blood Stock</h2>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-red-700 text-white">
                    <th class="border border-gray-300 px-4 py-2">Blood Group</th>
                    <th class="border border-gray-300 px-4 py-2">Available Units</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $groups = [
                        'A+' => 'bloodgroupAplus',
                        'B+' => 'bloodgroupBplus',
                        'O+' => 'bloodgroupOplus',
                        'A-' => 'bloodgroupAminus',
                        'B-' => 'bloodgroupBminus',
                        'O-' => 'bloodgroupOminus',
                        'AB+' => 'bloodgroupABplus',
                        'AB-' => 'bloodgroupABminus',
                    ];
                @endphp

                @foreach ($groups as $label => $field)
                    <tr class="bg-gray-50">
                        @if($bstocks->isNotEmpty())
                            @foreach ($bstocks as $bstock )
                                <td class="border border-gray-300 px-4 py-2 text-center font-bold">{{ $label }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $bstock->$field }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <span class="px-3 py-1 rounded text-white {{ $bstock->$field > 10 ? 'bg-green-500' : 'bg-yellow-500' }}">
                                        {{ $bstock->$field > 10 ? 'Sufficient' : 'Low' }}
                                    </span>
                                </td>

                            @endforeach
                        @else
                            <td class="border border-gray-300 px-4 py-2 text-center font-bold">{{$label}}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">Not available</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    </div>
</div>


</body>
</html>
