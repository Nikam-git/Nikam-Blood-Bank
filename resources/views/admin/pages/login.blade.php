@include('admin.headers.header-1')
<div class="flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full sm:w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Login</h2>
        <form action="{{route('admin.login')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" value="{{old('email')}}"id="email" name="email" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-blue-500 @error('email') is-invalid @enderror" placeholder="Enter your email">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-blue-500 @error('password') is-invalid @enderror" placeholder="Enter your password">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded hover:bg-red-900 ">Login</button>

        </form>
    </div>
</div>
</body>
</html>
