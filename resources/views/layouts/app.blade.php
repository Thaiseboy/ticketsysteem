<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketsysteem</title>
    <!-- Inladen van de CSS met Vite (TailwindCSS) -->
    @vite('resources/css/app.css')
    <!-- Inladen van de JavaScript met Vite -->
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Navigatiebalk -->
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between">
            <!-- Link naar de hoofdpagina (tickets overzicht) -->
            <a href="{{ route('tickets.index') }}" class="text-xl font-semibold">Ticketsysteem</a>
            <div>
                <!-- Knop om een nieuw ticket aan te maken -->
                <a href="{{ route('tickets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nieuw Ticket</a>
            </div>
        </div>
    </nav>

    <!-- Content Sectie: Hier wordt de inhoud van elke pagina weergegeven -->
    <main class="py-6">
        <div class="container mx-auto">
            <!-- De inhoud van de specifieke pagina wordt hier ingevoegd met yield -->
            @yield('content')
        </div>
    </main>
</body>
</html>