<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketsysteem</title>
    @vite('resources/css/app.css') 
    @vite('resources/js.app.js')
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Navigatiebalk -->
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('tickets.index') }}" class="text-xl font-semibold">Ticketsysteem</a>
            <div>
                <a href="{{ route('tickets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuw Ticket</a>
            </div>
        </div>
    </nav>

    <!-- Content Sectie -->
    <main class="py-6">
        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>
</body>
</html>