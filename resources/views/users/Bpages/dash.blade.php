

    <!-- Navigation Bar -->
    @include('users.headers.header-2')

    <!-- Hero Section -->
    <section class="text-center py-20 bg-red-100">
        <h2 class="text-4xl font-bold text-red-700">Donate Blood, Save Lives</h2>
        <p class="mt-4 text-gray-700">Join our mission to make blood accessible to everyone in need.</p>
        <a href="{{route('account.peopleinneed')}}" class="mt-6 inline-block bg-red-700 text-white px-6 py-2 rounded">Become a Donor</a>
    </section>

    <div class="space-y-10 mt-10 px-6">

        <!-- Recent Blood Requests Section -->
        <div>
            <h2 class="text-3xl font-bold text-red-700 mb-6">Recent Blood Requests</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($bloodRequests->take(3) as $request)
                    @if ($request->is_approved == "True")
                        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                            <!-- Blood Request Information -->
                            <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $request->user->name}}</h3>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-xs px-2 py-1 rounded-full {{ $request->status === 'Pending' ? 'bg-yellow-100 text-yellow-600' : 'bg-green-100 text-green-600' }}">
                                    {{ $request->status }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">📞 Phone: {{ $request->phone }}</p>
                            <p class="text-sm text-gray-600 mb-2">🩸 Blood Group: <span class="font-bold text-red-600">{{ $request->bloodgroup }}</span></p>
                            <p class="text-sm text-gray-600 mb-2">🗓️ Date Needed: {{ \Carbon\Carbon::parse($request->date)->format('M d, Y') }}</p>
                            <p class="text-sm text-gray-600 mb-2">💉 Amount: {{ $request->amount }} ml</p>
                            <p class="text-sm text-gray-600 mt-2">📝 Message: <span class="italic">{{ $request->message }}</span></p>

                            <!-- Action Button -->
                            <a href="javascript:void(0);" class="mt-4 inline-block bg-red-700 text-white px-6 py-3 rounded-lg hover:bg-red-800 w-full text-center transition duration-300">Accept Request</a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Upcoming Events Section -->
        <div>
            <h2 class="text-3xl font-bold text-red-700 mb-6">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($events->take(3) as $event)
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300">
                    <!-- Event Image -->
                    @if ($event->image)
                        <img src="{{asset('uploads/events/'.$event->image)}}" alt="Event Image" class="w-full h-40 object-cover rounded-lg mb-4">
                    @else
                        <img alt="{{ $event->name }}" class="w-full h-40 object-cover rounded-lg mb-4"/>
                    @endif

                    <!-- Event Information -->
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{ $event->name }}</h3>
                    <p class="text-sm text-gray-600 mb-2">📞 Phone: {{ $event->phone }}</p>
                    <p class="text-sm text-gray-600 mb-2">🗓️ From: {{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }} To: {{ \Carbon\Carbon::parse($event->end_date)->format('M d, Y') }}</p>
                    <p class="text-sm text-gray-600 mb-2">📍 Address: {{ $event->address }}</p>
                    <p class="text-sm text-gray-600 mb-2">👥 Total Donors: {{ $event->totaldonor }}</p>

                    <!-- Join Button -->
                    <a href="" class="mt-4 inline-block bg-red-700 text-white px-6 py-3 rounded-lg hover:bg-red-800 w-full text-center transition duration-300">Join</a>
                </div>
                @endforeach
            </div>
        </div>

    </div>



    <!-- About Section -->
    <section class="bg-white py-16 px-6 mt-10 text-center">
        <h2 class="text-3xl font-bold text-red-700">About Us</h2>
        <p class="mt-4 text-gray-700 max-w-2xl mx-auto">
            We are committed to providing safe and accessible blood donations for those in need.
            Our platform connects donors with recipients, ensuring timely availability of blood to save lives.
        </p>
    </section>

    <!-- Footer -->
    @include('users.footers.footer-2')

</body>
</html>
