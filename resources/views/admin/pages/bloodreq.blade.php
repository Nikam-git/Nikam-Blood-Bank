@include('admin.headers.header-2')

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-red-700 mb-6">Blood Requests List</h1>

            @if ($breqs->isNotEmpty())
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($breqs as $breq)
                        @if ($breq->is_approved=="False")
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                <h3 class="text-xl font-bold text-red-700 mb-2">Request #{{ $breq->id }}</h3>
                                <p class="text-gray-600"><span class="font-semibold">Requester:</span> {{ $breq->user->name ?? 'N/A' }}</p>
                                <p class="text-gray-600"><span class="font-semibold">Blood Group:</span> {{ $breq->bloodgroup }}</p>
                                <p class="text-gray-600"><span class="font-semibold">Phone:</span> {{ $breq->phone }}</p>
                                <p class="text-gray-600"><span class="font-semibold">Email:</span> {{ $breq->email }}</p>
                                <p class="text-gray-600"><span class="font-semibold">Amount:</span> {{ $breq->amount }} units</p>
                                <p class="text-gray-600"><span class="font-semibold">Date:</span> {{ \Carbon\Carbon::parse($breq->date)->format('d M Y') }}</p>
                                <p class="text-gray-600 mb-4">
                                    <span class="font-semibold">Status:</span>
                                    <span class="px-2 py-1 text-sm rounded-full font-semibold
                                        {{ $breq->status == 'Pending' ? 'bg-yellow-500' : 'bg-green-600' }} text-white">
                                        {{ $breq->status }}
                                    </span>
                                </p>

                                {{-- Optional Actions --}}
                                <div class="flex space-x-2">

                                    <a href="{{route('admin.approvebloodreq',$breq->id)}}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm shadow">
                                        Approve
                                    </a>
                                    <a href="{{route('admin.cancelBloodreq',$breq->id)}}" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm shadow">
                                        Reject
                                    </a>

                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
            @else
                <div class="bg-white shadow-xl rounded-2xl p-6 border border-red-200 text-center">
                    <span class="text-xl font-semibold text-red-600">No blood requests found.</span>
                </div>
            @endif
        </main>

    </div>
</body>
</html>
