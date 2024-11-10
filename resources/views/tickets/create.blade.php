@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Nieuw Ticket Aanmaken</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="block font-medium">Titel</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div class="mb-3">
            <label for="description" class="block font-medium">Omschrijving</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 border rounded"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Opslaan</button>
        <a href="{{ route('tickets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Annuleren</a>
    </form>
</div>
@endsection