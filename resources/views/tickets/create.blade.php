@extends('layouts.app')

@section('content')
<!-- Container voor het formulier om een nieuw ticket aan te maken -->
<div class="container mx-auto">
    <!-- Titel van de pagina -->
    <h1 class="text-2xl font-bold mb-4">Nieuw Ticket Aanmaken</h1>

    <!-- Formulier voor het aanmaken van een nieuw ticket -->
    <form action="{{ route('tickets.store') }}" method="POST">
        <!-- CSRF-token voor beveiliging tegen cross-site request forgery -->
        @csrf

        <!-- Inputveld voor de titel van het ticket -->
        <div class="mb-3">
            <label for="title" class="block font-medium">Titel</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                class="w-full px-4 py-2 border rounded" 
                required 
                placeholder="Voer de titel van het ticket in">
        </div>

        <!-- Inputveld voor de omschrijving van het ticket -->
        <div class="mb-3">
            <label for="description" class="block font-medium">Omschrijving</label>
            <textarea 
                name="description" 
                id="description" 
                class="w-full px-4 py-2 border rounded" 
                placeholder="Voer een omschrijving in (optioneel)"></textarea>
        </div>

        <!-- Knoppen voor opslaan en annuleren -->
        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded">Opslaan</button>
        <a href="{{ route('tickets.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded">Annuleren</a>
    </form>
</div>
@endsection