
    <!-- Header -->
    @include('users.headers.header-1')

    <!-- Hero Section -->
    <section class="bg-red-100 py-20 text-center">
        <h2 class="text-4xl font-bold text-red-700">About Us</h2>
        <p class="text-gray-700 mt-4 text-lg max-w-2xl mx-auto">
            We are committed to saving lives by providing a reliable and efficient blood donation system.
        </p>
    </section>

    <!-- Our Mission Section -->
    <section class="container mx-auto px-20 py-16">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h3 class="text-3xl font-bold text-red-600">Our Mission</h3>
                <p class="text-gray-700 mt-4 leading-relaxed">
                    Our mission is to bridge the gap between blood donors and recipients by providing a seamless and secure platform for blood donation.
                </p>
            </div>
            <div>
                <img src="{{asset('images/bb.jpeg')}}" alt="Blood Donation" class="rounded-lg shadow-lg mx-auto">
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-bold text-center text-red-600">Why Choose Us?</h3>
            <div class="grid md:grid-cols-3 gap-8 mt-10">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h4 class="text-xl font-semibold text-red-700">Reliable & Secure</h4>
                    <p class="text-gray-600 mt-2">We ensure safety and confidentiality in every blood donation.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h4 class="text-xl font-semibold text-red-700">Fast Response</h4>
                    <p class="text-gray-600 mt-2">Connecting donors with recipients quickly and efficiently.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h4 class="text-xl font-semibold text-red-700">Community Support</h4>
                    <p class="text-gray-600 mt-2">Join a strong network of volunteers and life-savers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-red-600 text-white py-16 text-center">
        <h3 class="text-3xl font-bold">Be a Hero, Donate Blood</h3>
        <p class="mt-4 text-lg">Join our mission to save lives. Your small act of kindness can make a big difference.</p>
        <a href="#" class="mt-6 inline-block bg-white text-red-600 px-6 py-3 rounded-full font-bold shadow-md hover:bg-gray-200">Donate Now</a>
    </section>

    <!-- Footer -->
    @include('users.footers.footer-1')

</body>
</html>
