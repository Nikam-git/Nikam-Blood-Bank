@include('admin.headers.header-2')
<div class="flex items-center justify-center min-h-screen bg-gray-100 ml-80">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-red-700">Donation To Our Organization</h2>
        <form action="{{ route('admin.addblood') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="bloodgroup" class="block text-gray-700 font-bold mb-2">Blood Group</label>
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
                <label for="amountofblood" class="block text-gray-700 font-bold mb-2">Amount of Blood (ml)</label>
                <input type="number" id="amountofblood" name="amountofblood" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-red-500" placeholder="Enter blood amount in ml" required>
            </div>

            <button type="submit" class="w-full bg-red-700 text-white py-2 px-4 rounded hover:bg-red-900 transition duration-200">
                Register
            </button>
        </form>
    </div>
</div>

</body>
</html>
