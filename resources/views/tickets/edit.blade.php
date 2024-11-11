@extends('layouts.app')

@section('content')
<!-- Container voor het formulier om een bestaand ticket te bewerken -->
<div class="container mx-auto">
    <!-- Titel van de pagina -->
    <h1 class="text-2xl font-bold mb-4">Ticket Bewerken</h1>

    <!-- Formulier voor het bijwerken van een bestaand ticket -->
    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        <!-- CSRF-token voor beveiliging -->
        @csrf
        <!-- Methode 'PUT' voor het bijwerken van een bestaande resource -->
        @method('PUT')

        <!-- Inputveld voor het bijwerken van de titel van het ticket -->
        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700">Titel</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="w-full px-4 py-2 border rounded" 
                value="{{ $ticket->title }}" 
                required 
                placeholder="Voer de nieuwe titel van het ticket in">
        </div>

        <!-- Inputveld voor het bijwerken van de omschrijving van het ticket -->
        <div class="mb-4">
            <label for="description" class="block font-medium text-gray-700">Omschrijving</label>
            <textarea 
                name="description" 
                id="description" 
                class="w-full px-4 py-2 border rounded" 
                placeholder="Voer de nieuwe omschrijving in (optioneel)">{{ $ticket->description }}</textarea>
        </div>

        <!-- Knoppen voor opslaan en annuleren -->
        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Opslaan</button>
            <a href="{{ route('tickets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Annuleren</a>
        </div>
    </form>
</div>
@endsection