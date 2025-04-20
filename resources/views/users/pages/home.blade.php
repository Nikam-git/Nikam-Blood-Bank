


    <!-- Navbar -->
    @include('users.headers.header-1')

    <!-- Hero Section -->
    <section class=" relative bg-cover bg-center h-screen flex items-center justify-center text-center text-white z-10" style="background-image: url('{{asset('images/Blood-Donation-1.webp')}}');">
        <div class="bg-black bg-opacity-50 p-10 rounded-lg">
            <h2 class="text-4xl font-bold">Donate Blood, Save a Life</h2>
            <p class="mt-4 text-lg">Your blood donation can give someone another chance at life.</p>
            <div class="mt-6">
                @if (Auth::User())
                <a href="{{route('account.peopleinneed')}}" class="bg-red-500 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-red-700">Become a Donor</a>
                <a href="{{route('account.bloodstocks')}}" class="bg-white text-red-500 px-6 py-3 rounded-lg text-lg font-semibold ml-4 hover:bg-gray-200">Find Blood</a>
                @else
                <a href="{{route('account.loginpage')}}" class="bg-red-500 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-red-700">Become a Donor</a>
                <a href="{{route('account.loginpage')}}" class="bg-white text-red-500 px-6 py-3 rounded-lg text-lg font-semibold ml-4 hover:bg-gray-200">Find Blood</a>
                @endif
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="container mx-auto my-16 px-6">
        <h2 class="text-3xl font-bold text-center">Why Donate Blood?</h2>
        <div class="grid md:grid-cols-3 gap-8 mt-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Saves Lives</h3>
                <p class="mt-2 text-gray-600">Every drop of blood donated can save up to three lives.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Health Benefits</h3>
                <p class="mt-2 text-gray-600">Regular donation improves heart health and reduces harmful iron levels.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Community Support</h3>
                <p class="mt-2 text-gray-600">Your donation can help accident victims, cancer patients, and those in need.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold">What Our Donors Say</h2>
            <div class="mt-8 grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600 italic">"Donating blood was the best decision of my life. Knowing I helped save a life is rewarding!"</p>
                    <h4 class="font-bold mt-4">- John Doe</h4>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600 italic">"I encourage everyone to donate. It's quick, safe, and truly impactful!"</p>
                    <h4 class="font-bold mt-4">- Jane Smith</h4>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600 italic">"A small act of kindness can mean the world to someone in need. Donate blood!"</p>
                    <h4 class="font-bold mt-4">- Alex Brown</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    @if(Auth::User())
    <section class="bg-red-600 text-white py-16 text-center">
        <h2 class="text-3xl font-bold">Community Events</h2>

        <a href="{{route('account.eventpage')}}" class="mt-6 bg-white text-red-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gray-200">Events</a>
    </section>
    @else
        <section class="bg-red-600 text-white py-16 text-center">
            <h2 class="text-3xl font-bold">Join the Blood Donor Community</h2>
            <p class="mt-4 text-lg mb-6">Sign up today and be a hero for someone in need.</p>
            <a href="{{route('account.registerpage')}}" class="mt-6 bg-white text-red-600 px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gray-200">Sign Up Now</a>
        </section>
    @endif

    <!-- Footer -->
    @include('users.footers.footer-1')

</body>
</html>
