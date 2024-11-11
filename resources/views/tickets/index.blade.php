@extends('layouts.app')

@section('content')
<!-- Container voor het overzicht van alle tickets -->
<div class="container mx-auto">
    <!-- Titel van de pagina -->
    <h1 class="text-2xl font-bold mb-4">Tickets Overzicht</h1>

    <!-- Knop om een nieuw ticket aan te maken -->
    <a href="{{ route('tickets.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">Nieuw Ticket</a>

    <!-- Succesbericht bij acties zoals aanmaken of bijwerken van een ticket -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel met lijst van tickets -->
    <div class="bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <!-- Kop van de tabel met kolomnamen -->
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titel</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Omschrijving</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acties</th>
                </tr>
            </thead>

            <!-- Inhoud van de tabel met gegevens van de tickets -->
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Loop door alle tickets heen -->
                @forelse($tickets as $ticket)
                    <tr>
                        <td class="px-6 py-4">{{ $ticket->id }}</td>
                        <td class="px-6 py-4">{{ $ticket->title }}</td>
                        <td class="px-6 py-4">{{ $ticket->description }}</td>
                        <td class="px-6 py-4">
                            <!-- Links voor het bekijken en bewerken van een ticket -->
                            <a href="{{ route('tickets.show', $ticket) }}" class="text-blue-600 hover:text-yellow-900">Bekijken</a>
                            <a href="{{ route('tickets.edit', $ticket) }}" class="text-blue-600 hover:text-yellow-900 ml-2">Bewerken</a>
                        </td>
                    </tr>
                @empty
                    <!-- Weergeven als er geen tickets beschikbaar zijn -->
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Geen tickets gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection