@include('admin.headers.header-2')
<div class="container mx-auto my-10 p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-3xl font-bold text-red-700 text-center mb-8">Upcoming Blood Donation Events</h2>

    @if ($events->isNotEmpty())
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($events as $event)
                @if ($event->is_approved == "False")
                <div class="bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    @if ($event->image)
                        <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->name }}" class="w-full h-48 object-cover">
                    @else
                        <img src="https://source.unsplash.com/400x250/?blood,donation" alt="{{ $event->name }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-5">
                        <h3 class="text-xl font-semibold text-red-700 mb-2">{{ $event->name }}</h3>
                        <p class="text-gray-600"><strong>Phone:</strong> {{ $event->phone }}</p>
                        <p class="text-gray-600"><strong>Start:</strong> {{ $event->start_date }}</p>
                        <p class="text-gray-600"><strong>End:</strong> {{ $event->end_date }}</p>
                        <p class="text-gray-600"><strong>Location:</strong> {{ $event->address }}</p>
                        <p class="text-gray-600"><strong>Total Donors:</strong> {{ $event->totaldonor }}</p>
                        <a href="{{route('admin.approveevent',$event->id)}}" class="mt-4 bg-red-700 text-white px-4 py-2 rounded w-full hover:bg-red-800 block text-center">Approve</a>
                        <a href="javascript:void(0);"
                                onclick="openModal({{ $event->id }})"
                                class="mt-4 bg-red-700 text-white px-4 py-2 rounded w-full hover:bg-red-800 block text-center">
                                Disapprove
                                </a>

                                <!-- Delete Form -->
                                <form id="deleteForm" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Modal -->
                                <div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                                    <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
                                        <h2 class="text-lg font-bold text-gray-800 mb-4">Confirm Deletion</h2>
                                        <p class="text-gray-600 mb-6">Are you sure you want to cancel this event?</p>
                                        <div class="flex justify-center gap-4">
                                            <button onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">Cancel</button>
                                            <button type="button" onclick="submitDelete()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Delete</button>
                                        </div>
                                    </div>
                                </div>

                    </div>
                </div>

                @endif
            @endforeach
        </div>
    @else
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded-lg text-center mt-6">
            <p class="text-xl font-semibold">No upcoming events at the moment.</p>
        </div>
    @endif
    <div class="pt-6 text-center">
        <a href="{{ route('admin.addEventpage') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-300">
            Add Event
        </a>
    </div>
</div>



</body>
</html>
