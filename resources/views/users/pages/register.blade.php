

    @include('users.headers.header-1')

    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Create an Account</h2>
            <form action="{{route('account.register')}}" method="POST">
            @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Full Name</label>
                    <input type="text" value="{{old('name')}}"id="name" name="name" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-blue-500 @error('name') is-invalid @enderror" placeholder="Enter your name">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" value="{{old('email')}}" id="email" name="email" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-blue-500 @error('email') is-invalid @enderror" placeholder="Enter your email">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phonenumber" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                    <input type="text" value="{{old('phonenumber')}}"id="phonenumber" name="phonenumber" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-blue-500 @error('phonenumber')is-invalid @enderror" placeholder="Enter your phone number">
                    @error('phonenumber')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                    <input type="text" value="{{old('address')}}" id="address" name="address" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-blue-500 @error('address') is-invalid @enderror" placeholder="Enter your address">
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-blue-500 @error('password') is-invalid @enderror" placeholder="Create a password">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:border-blue-500 @error('password_confirmation') is-invalid @enderror" placeholder="Confirm your password">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Sign Up</button>
                <p class="text-sm text-gray-600 mt-4 text-center">Already have an account? <a href="{{route('account.loginpage')}}" class="text-blue-500 hover:underline">Login</a></p>
            </form>
        </div>
    </div>

</body>
</html>
