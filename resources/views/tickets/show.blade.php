@extends('layouts.app')

@section('content')
<!-- Container voor de details van het geselecteerde ticket -->
<div class="container mx-auto">
    <!-- Titel van de pagina -->
    <h1 class="text-2xl font-bold mb-4">Ticket Details</h1>

    <!-- Informatiekaart voor het ticket -->
    <div class="bg-white p-6 shadow rounded-lg">
        <!-- Titel van het ticket -->
        <h2 class="text-xl font-semibold mb-2">{{ $ticket->title }}</h2>
        <!-- Omschrijving van het ticket -->
        <p class="text-gray-700">{{ $ticket->description }}</p>

        <!-- Actieknoppen voor navigatie, bewerken, voltooien en verwijderen -->
        <div class="mt-4">
            <!-- Link terug naar de lijstweergave van tickets -->
            <a href="{{ route('tickets.index') }}" class="bg-blue-700 text-white px-4 py-2 rounded">Terug naar Overzicht</a>
            <!-- Link naar de bewerkingspagina van het ticket -->
            <a href="{{ route('tickets.edit', $ticket) }}" class="bg-yellow-500 text-white px-4 py-2 rounded ml-10">Bewerken</a>

            <!-- Formulier voor het voltooien van het ticket met bevestigingsvraag -->
            <form action="{{ route('tickets.complete', $ticket) }}" method="POST" class="inline-block" onsubmit="return confirm('Weet je zeker dat je dit ticket wilt voltooien?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Voltooien</button>
            </form>

            <!-- Formulier voor het verwijderen van het ticket met bevestigingsvraag -->
            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="inline-block" onsubmit="return confirm('Weet je zeker dat je dit ticket wilt verwijderen?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Verwijderen</button>
            </form>
        </div>
    </div>
</div>
@endsection