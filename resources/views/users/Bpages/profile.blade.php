@include('users.headers.header-2')

<div class="max-w-7xl mx-80 mt-12 bg-dark p-5 rounded-2xl shadow-lg border-gray-400 border-x rounded-xs">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Profile Overview</h2>
    <div class="space-y-4">
      <div class="flex justify-between items-center border-b pb-3">
        <span class="text-gray-600 font-medium">Name:</span>
        <span class="text-gray-900 font-semibold">{{$user->name}}</span>
      </div>
      <div class="flex justify-between items-center border-b pb-3">
        <span class="text-gray-600 font-medium">Email:</span>
        <span class="text-gray-900 font-semibold">{{$user->email}}</span>
      </div>
      <div class="flex justify-between items-center border-b pb-3">
        <span class="text-gray-600 font-medium">Phone Number:</span>
        <span class="text-gray-900 font-semibold">{{$user->phone_number}}</span>
      </div>
      <div class="flex justify-between items-center border-b pb-3">
        <span class="text-gray-600 font-medium">Address:</span>
        <span class="text-gray-900 font-semibold">{{$user->address}}</span>
      </div>
      <div class="flex justify-between items-center border-b pb-3">
        <span class="text-gray-600 font-medium">Role:</span>
        <span class="text-gray-900 font-semibold">{{$user->role}}</span>
      </div>
    </div>
    <div class="mt-6 text-right">
      <a href="" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
        Edit Profile
      </a>
    </div>
</div>


@include('users.footers.footer-2')
</body>
</html>
