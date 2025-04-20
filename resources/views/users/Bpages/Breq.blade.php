@include('users.headers.header-2')
<div class="flex flex-col sm:flex-row gap-8 min-h-screen p-6 bg-gray-100">
    {{-- Pending Requests Section --}}
    <div class="sm:w-1/2 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-red-700 mb-4">Your Pending Requests</h2>
        @if(count($pendingRequests) > 0)
            <ul class="space-y-4">
                @foreach($pendingRequests as $req)
                    <li class="border p-3 rounded shadow-sm bg-red-50">
                        <p><strong>Blood Group:</strong> {{ $req->bloodgroup }}</p>
                        <p><strong>Amount:</strong> {{ $req->amount }} ml</p>
                        <p><strong>Date:</strong> {{ $req->date }}</p>
                        <p><strong>Status:</strong> {{ $req->status ?? 'Pending' }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600">You have no pending blood requests.</p>
        @endif
    </div>

    {{-- Blood Request Form --}}
    <div class="sm:w-1/2 bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-red-700">Request Blood</h2>
        <form action="{{ route('account.bloodrequest_reg') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" placeholder="Enter your email" required>
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
                <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" placeholder="Enter your phone number" required>
            </div>

            <div class="mb-4">
                <label for="bloodgroup" class="block text-gray-700 font-bold mb-2">Required Blood Group</label>
                <select id="bloodgroup" name="bloodgroup" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" required>
                    <option value="">Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700 font-bold mb-2">Amount of Blood (ml)</label>
                <input type="number" id="amount" name="amount" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" placeholder="Enter amount in ml" required>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-bold mb-2">Required Date</label>
                <input type="date" id="date" name="date" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" required>
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                <textarea id="message" name="message" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" placeholder="Enter additional details" required></textarea>
            </div>

            <button type="submit" class="w-full bg-red-700 text-white py-2 px-4 rounded hover:bg-red-900">Request Blood</button>
        </form>
    </div>
</div>


<!-- Footer -->
@include('users.footers.footer-2')
</body>
</html>
