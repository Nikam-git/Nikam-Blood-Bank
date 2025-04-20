

    <!-- Navigation Bar -->
    @include('users.headers.header-2')

    <!-- Donor Registration Form -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full sm:w-96">
            <h2 class="text-2xl font-bold mb-6 text-center text-red-700">Donor Registration</h2>
            <form action="{{ route('account.donor_registration', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="bloodgroup" value="{{ $bloodgroup }}">

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" required>
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
                    <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" required>
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                    <input type="text" id="address" name="address" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" required>
                </div>

                <div class="mb-4">
                    <label for="amountofblood" class="block text-gray-700 font-bold mb-2">Amount of Blood (ml)</label>
                    <input type="number" id="amountofblood" name="amountofblood" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" required>
                </div>

                <button type="submit" class="w-full bg-red-700 text-white py-2 px-4 rounded hover:bg-red-900">Register</button>
            </form>

        </div>
    </div>

    <!-- Footer -->
    @include('users.footers.footer-2')
</body>
</html>
