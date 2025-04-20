@include('admin.headers.header-2')
<main class="flex-1 p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Donors List</h1>

    <!-- Donors Table -->
    <div class="bg-white shadow-md rounded-lg p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-red-700 text-white">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">phone number</th>
                    <th class="px-4 py-2">Blood Group</th>
                    <th class="px-4 py-2">Amount of blood</th>
                    <th class="px-4 py-2">To user and their id</th>
                    <th class="px-4 py-2">by user and their id</th>

                </tr>
            </thead>
            <tbody>
                @if($donors->isNotEmpty())
                    @foreach($donors as $donor)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $donor->id }}</td>
                            <td class="px-4 py-2">{{ $donor->name }}</td>
                            <td class="px-4 py-2">{{ $donor->phone }}</td>
                            <td class="px-4 py-2">{{ $donor->bloodgroup }}</td>
                            <td class="px-4 py-2">{{ $donor->amountofblood }}</td>
                            <td class="px-4 py-2">{{ $donor->receiver->name ?? 'N/A' }} (ID: {{ $donor->to_user_id }})</td>
                            <td class="px-4 py-2">{{ $donor->user->name ?? 'N/A' }} (ID: {{ $donor->donor_id }})</td>

                            {{-- <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('admin.donors.edit', $donor->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('admin.donors.delete', $donor->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                @else
                    <tr class="border-b">
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">No donors found</td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>
</main>
</div>

</body>
</html>
