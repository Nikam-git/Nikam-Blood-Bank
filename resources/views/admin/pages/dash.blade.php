@include('admin.headers.header-2')

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>


            <!-- Blood Stock Table -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Blood Stock</h2>
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

            <!-- Recent Donor Requests -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Recent Donor Requests</h2>
                @if ($donors->isNotEmpty())
                    <table class="w-full mt-4 border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4 border">Name</th>
                                <th class="py-2 px-4 border">Email</th>
                                <th class="py-2 px-4 border">Phone</th>
                                <th class="py-2 px-4 border">Blood Group</th>
                                <th class="py-2 px-4 border">Date</th>
                                <th class="py-2 px-4 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donors as $donor)
                                <tr class="text-center">
                                    <td class="py-2 px-4 border">{{$donor->name}}</td>
                                    <td class="py-2 px-4 border">{{$donor->email}}</td>
                                    <td class="py-2 px-4 border">{{$donor->phone}}</td>
                                    <td class="py-2 px-4 border">{{$donor->bloodgroup}}</td>
                                    <td class="py-2 px-4 border">{{$donor->date}}</td>
                                    <td class="py-2 px-4 border text-yellow-500">{{$donor->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-red-500">No data Available</p>
                @endif

            </div>

            <!-- Recent Blood Requests -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">Recent Blood Requests</h2>
                @if ($breqs->isNotEmpty())
                    <table class="w-full mt-4 border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4 border">Email</th>
                                <th class="py-2 px-4 border">Phone</th>
                                <th class="py-2 px-4 border">Blood Group</th>
                                <th class="py-2 px-4 border">Date</th>
                                <th class="py-2 px-4 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($breqs as $breq)
                                <tr class="text-center">
                                    <td class="py-2 px-4 border">{{$breq->email}}</td>
                                    <td class="py-2 px-4 border">{{$breq->phone}}</td>
                                    <td class="py-2 px-4 border">{{$breq->bloodgroup}}</td>
                                    <td class="py-2 px-4 border">{{$breq->date}}</td>
                                    <td class="py-2 px-4 border">{{$breq->status}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-red-500">No data Available</p>
                @endif
            </div>

        </main>
    </div>
</div>
</body>
</html>
