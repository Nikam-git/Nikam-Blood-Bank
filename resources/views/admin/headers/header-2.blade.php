<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        let selectedEventId = null;

        function openModal(id) {
            selectedEventId = id;
            document.getElementById('confirmModal').classList.remove('hidden');
            const form = document.getElementById('deleteForm');
            form.setAttribute('action', `/admin/cancelevent/${id}`);
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
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-red-700 text-white min-h-screen p-6">
            <h2 class="text-2xl font-bold">Admin Dashboard</h2>
            <nav class="mt-6">
                <a href="{{route('admin.dashboard')}}" class="block py-2 px-4 rounded hover:bg-red-600">Dashboard</a>
                <a href="{{route('admin.donorspage')}}" class="block py-2 px-4 rounded hover:bg-red-600">Donors</a>
                <a href="{{route('admin.bloodrequestspage')}}" class="block py-2 px-4 rounded hover:bg-red-600">Blood Requests</a>
                <a href="{{route('admin.bloodstocklist')}}" class="block py-2 px-4 rounded hover:bg-red-600">Blood Stocks</a>
                <a href="{{route('admin.eventlists')}}" class="block py-2 px-4 rounded hover:bg-red-600">Events</a>
                <a href="{{route('admin.logout')}}" class="block py-2 px-4 rounded hover:bg-red-600">Logout</a>
            </nav>
        </aside>
