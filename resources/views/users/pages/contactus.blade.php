@include('users.headers.header-1')


<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-red-100 via-white to-red-100 px-4 py-12">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-xl transition duration-300">
        <h2 class="text-3xl font-extrabold text-center text-red-700 mb-6">Get in Touch</h2>
        <p class="text-gray-600 text-center mb-8">We’d love to hear from you! Fill out the form and we’ll be in touch soon.</p>

        <form action="/contact" method="POST" class="space-y-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-1">Name</label>
                <input type="text" name="name" placeholder="Your Name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-red-500 focus:outline-none transition" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" placeholder="you@example.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-red-500 focus:outline-none transition" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Subject</label>
                <input type="text" name="subject" placeholder="Subject"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-red-500 focus:outline-none transition" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">Message</label>
                <textarea name="message" rows="5" placeholder="Write your message..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-red-500 focus:outline-none transition resize-none" required></textarea>
            </div>

            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-xl shadow-lg transition duration-300">
                Send Message
            </button>
        </form>
    </div>
</div>


    @include('users.footers.footer-1')
</body>
</html>
