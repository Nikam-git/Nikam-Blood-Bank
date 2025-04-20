@include('admin.headers.header-2')
<div class="container mx-auto my-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-3xl font-bold text-red-700 text-center mb-6">Company Blood Stock</h2>

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
                            <td class="border border-gray-300 px-4 py-2 text-center">Not Added</td>
                        @endif
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h2 class="text-3xl font-bold text-red-700 text-center mb-6">Donation to company</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-red-700 text-white">
                    <th class="border border-gray-300 px-4 py-2">name</th>
                    <th class="border border-gray-300 px-4 py-2">phone</th>
                    <th class="border border-gray-300 px-4 py-2">address</th>
                    <th class="border border-gray-300 px-4 py-2">bloodgroup</th>
                    <th class="border border-gray-300 px-4 py-2">amount of blood</th>
                    <th class="border border-gray-300 px-4 py-2">donor id</th>
                </tr>

            </thead>
            <tbody>
                @if ($companydonations->isNotEmpty())
                    @foreach ($companydonations as $cd )
                        <tr class="bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">{{$cd->name}}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{$cd->phone}}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{$cd->address}}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{$cd->bloodgroup}}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{$cd->amountofblood}}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{$cd->donor_id}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>
    <div class="pt-6 text-center">
        <a href="{{ route('admin.addbloodpage') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 shadow-md">
        Add Blood to stock
        </a>
    </div>
    </div>
</div>

</body>
</html>
