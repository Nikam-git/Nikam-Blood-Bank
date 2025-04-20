@include('users.headers.header-2')
    <!-- Event Section -->
    <div class="container mx-auto my-10 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-3xl font-bold text-red-700 text-center mb-6">Your pending post</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @if($events->isNotEmpty())
                @foreach ($events as $event)
                    @if($event->is_approved == "False")
                        @if ($event->user_id == Auth::user()->id)
                            <div class="bg-white p-4 rounded-lg shadow-lg">
                                @if ($event->imgae)
                                    <img src="{{asset('uploads/events/'.$event->image)}}" alt="Event Image" class="w-full h-40 object-cover rounded-lg">
                                @else
                                    <img alt={{$event->name}}/>
                                @endif
                                <h3 class="text-xl font-bold mt-4">{{$event->name}}</h3>
                                <p class="text-gray-600">{{$event->phone}}</p>
                                <p class="text-gray-600">{{$event->start_date}}</p>
                                <p class="text-gray-600">{{$event->end_date}}</p>
                                <p class="text-gray-600">{{$event->address}}</p>
                                <p class="text-gray-600">{{$event->totaldonor}}</p>
                                <!-- Cancel Button -->
                                <a href="javascript:void(0);"
                                onclick="openModal({{ $event->id }})"
                                class="mt-4 bg-red-700 text-white px-4 py-2 rounded w-full hover:bg-red-800 block text-center">
                                Cancel
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
                        @endif

                    @endif

                @endforeach
            @else
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-red-200 text-center col-span-3">
                <span class="text-xl font-semibold text-red-600">You have not posted</span>
            </div>
            @endif
        </div>
        <h2 class="text-3xl font-bold text-red-700 text-center mb-6">Events you joind</h2>

        <div class="grid md:grid-cols-3 gap-6">
            @if ($joinedevents->isNotEmpty())
                @foreach ($joinedevents as $jevent)
                    @php
                        $event = $jevent->events;
                    @endphp

                    @if ($event && $event->is_approved == "True")
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            @if ($event->image)
                                <img src="{{ asset('uploads/events/' . $event->image) }}" alt="Event Image" class="w-full h-40 object-cover rounded-lg">
                            @else
                                <img src="https://source.unsplash.com/400x250/?blood,donation" alt="{{ $event->name }}" class="w-full h-40 object-cover rounded-lg">
                            @endif

                            <h3 class="text-xl font-bold mt-4">{{ $event->name }}</h3>
                            <p class="text-gray-600">{{ $event->phone }}</p>
                            <p class="text-gray-600">{{ $event->start_date }}</p>
                            <p class="text-gray-600">{{ $event->end_date }}</p>
                            <p class="text-gray-600">{{ $event->address }}</p>
                            <p class="text-gray-600">Total Donors: {{ $event->totaldonor }}</p>
                            <p class="text-gray-600">Hosted by: {{ $event->user->name }}</p>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="bg-white shadow-xl rounded-2xl p-6 border border-red-200 text-center col-span-3">
                    <span class="text-xl font-semibold text-red-600">You have not joined any events</span>
                </div>
            @endif
        </div>

        <h2 class="text-3xl font-bold text-red-700 text-center mb-6">Blood Donation Events</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $approvedEvents = $events->where('is_approved', "True");
            @endphp

            @if ($approvedEvents->isNotEmpty())
                @foreach ($approvedEvents as $event)
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        @if ($event->image)
                            <img src="{{ asset('uploads/events/' . $event->image) }}" alt="Event Image" class="w-full h-40 object-cover rounded-lg">
                        @else
                            <img src="https://source.unsplash.com/400x250/?blood,donation" alt="{{ $event->name }}" class="w-full h-40 object-cover rounded-lg">
                        @endif

                        <h3 class="text-xl font-bold mt-4">{{ $event->name }}</h3>
                        <p class="text-gray-600">Phone: {{ $event->phone }}</p>
                        <p class="text-gray-600">Start Date: {{ $event->start_date }}</p>
                        <p class="text-gray-600">End Date: {{ $event->end_date }}</p>
                        <p class="text-gray-600">Address: {{ $event->address }}</p>
                        <p class="text-gray-600">Total Donors: {{ $event->totaldonor }}</p>
                        <p class="text-gray-600">Hosted By: {{ $event->user->name }}</p>
                        <form action="{{ route('account.joinevent', $event->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-4 bg-red-700 text-white px-4 py-2 rounded w-full hover:bg-red-800 block text-center">
                                Join Event
                            </button>
                        </form>

                    </div>
                @endforeach
            @else
                <div class="bg-white shadow-xl rounded-2xl p-6 border border-red-200 text-center col-span-full">
                    <span class="text-xl font-semibold text-red-600">No Events Currently</span>
                </div>
            @endif
        </div>

    </div>
    <div class="pt-6 text-center">
        <a href="{{ route('account.applyeventpage') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-300">
            Post your own Event
        </a>
    </div>

    <!-- Footer -->
    @include('users.footers.footer-2')
</body>
</html>
