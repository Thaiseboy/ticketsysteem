@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Ticket Bewerken</h1>

    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700">Titel</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 border rounded" value="{{ $ticket->title }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium text-gray-700">Omschrijving</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 border rounded">{{ $ticket->description }}</textarea>
        </div>

        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Opslaan</button>
            <a href="{{ route('tickets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Annuleren</a>
        </div>
    </form>
</div>
@endsection