<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.querySelector('button');
            const dropdownMenu = document.querySelector('div.absolute');
            const successDiv = document.getElementById('Success');
            const errorDiv = document.getElementById('error');
            dropdownButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('hidden');
            });
            if (successDiv) {
                setTimeout(() => {
                    $(successDiv).fadeOut('fast');
                }, 4000);
            }
            if (errorDiv) {
                setTimeout(() => {
                    $(errorDiv).fadeOut('fast');
                }, 4000);
            }
        });
        let selectedEventId = null;

        function openModal(id) {
            selectedEventId = id;
            document.getElementById('confirmModal').classList.remove('hidden');
            const form = document.getElementById('deleteForm');
            form.setAttribute('action', `/account/cancelevent/${id}`);
        }

        function closeModal() {
            document.getElementById('confirmModal').classList.add('hidden');
        }

        function submitDelete() {
            const form = document.getElementById('deleteForm');
            if (form && form.action) {
                form.submit();
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-red-700 text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold"><a href="{{route('account.home')}}">Blood Bank System</a></h1>
        <div class="space-x-4">
            <a href="{{route('account.peopleinneed')}}" class="px-4">Donate</a>
            <a href="{{route('account.bloodrequestpage')}}" class="px-4">Request Blood</a>
            <a href="{{route('account.bloodstocks')}}" class="px-4">Blood Stock</a>
            <a href="{{route('account.eventpage')}}" class="px-4">Events</a>
            <div class="relative inline-block">
                <button class="dropdown-button px-4 py-2 bg-gray-700 text-white rounded-full flex items-center space-x-2">
                    <span>{{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg border border-gray-200 hidden">
                    <ul>
                        <li><a href="{{ route('account.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a></li>
                        <li><a href="{{ route('account.logout') }}" class="block px-4 py-2 text-red-700 hover:bg-gray-200">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @if(Session::has('Success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded" id="Success">
            {{ Session::get('Success') }}
        </div>
    @endif

    @if(Session::has('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded" id="error">
            {{ Session::get('error') }}
        </div>
    @endif
