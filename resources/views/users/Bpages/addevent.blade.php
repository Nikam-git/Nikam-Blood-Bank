@include('users.headers.header-2')

<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-2xl">
        <h2 class="text-3xl font-bold text-center text-red-700 mb-8">Create Blood Donation Event</h2>

        <form action="{{route('account.addevent')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Event Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
                <input type="text" id="phone" name="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
            </div>
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
            </div>

            <!-- End Date -->
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date</label>
                <input type="date" id="end_date" name="end_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                <textarea id="address" name="address" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500" required></textarea>
            </div>
            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-bold mb-2">Event Image</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
            </div>
            <button type="submit" class="w-full bg-red-700 text-white py-2 px-4 rounded-lg font-semibold hover:bg-red-800 transition duration-300">
                Create Event
            </button>
        </form>
    </div>
</div>


@include('users.footers.footer-2')
