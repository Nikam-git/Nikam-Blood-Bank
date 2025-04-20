@include('users.headers.header-2')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-red-700 mb-6 text-center">Active Blood Requests</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- Card 1 -->
        @if ($breqs->isNotEmpty())
            @foreach ( $breqs as $breq)
                @if ($breq->is_approved == "True")
                    <div class="bg-white shadow-xl rounded-2xl p-8 border border-red-200 ">
                        <div class="flex items-center justify-between mb-4 gap-10">
                            <h2 class="text-xl font-semibold text-red-600">Blood Needed</h2>
                            <span class="text-sm text-gray-500">Till: {{$breq->date}}</span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600 font-medium">Name:</span>
                                <span class="text-gray-800 font-semibold">{{$breq->user->name}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 font-medium">Blood Group:</span>
                                <span class="text-red-600 font-bold text-lg">{{$breq->bloodgroup}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 font-medium">Phone:</span>
                                <span class="text-gray-800 font-semibold">{{$breq->phone}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 font-medium">Email:</span>
                                <span class="text-gray-800 font-semibold">{{$breq->email}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 font-medium">Amount Needed:</span>
                                <span class="text-gray-800 font-semibold">{{ $breq->amount }} units</span>
                            </div>
                            <div class="pt-4">
                                <p class="text-sm text-gray-500 italic">"{{$breq->message}}"</p>
                            </div>
                        </div>
                        <div class="pt-6 text-center">
                            <a href="{{ route('account.donorpage', [$breq->user->id,$breq->bloodgroup]) }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 shadow-md">
                            Donate Now
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-red-200">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xl font-semibold text-red-600">No Donation Requests</span>

                </div>
            </div>
        @endif

    </div>
    <div class="pt-6 text-center">
        <a href="{{ route('account.companydonationpage') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-300 shadow-md">
        Donate To company
        </a>
    </div>
  </div>


@include('users.footers.footer-2')
</body>
</html>
