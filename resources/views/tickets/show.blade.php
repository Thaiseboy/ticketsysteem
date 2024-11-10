@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Ticket Details</h1>

    <div class="bg-white p-6 shadow rounded-lg">
        <h2 class="text-xl font-semibold mb-2">{{ $ticket->title }}</h2>
        <p class="text-gray-700">{{ $ticket->description }}</p>

        <div class="mt-4">
            <a href="{{ route('tickets.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Terug naar Overzicht</a>
            <a href="{{ route('tickets.edit', $ticket) }}" class="bg-yellow-500 text-white px-4 py-2 rounded ml-2">Bewerken</a>

            <form action="{{ route('tickets.complete', $ticket) }}" method="POST" class="inline-block" onsubmit="return confirm('Weet je zeker dat je dit ticket wilt voltooien?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Voltooien</button>
            </form>

            <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" class="inline-block" onsubmit="return confirm('Weet je zeker dat je dit ticket wilt verwijderen?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Verwijderen</button>
            </form>
        </div>
    </div>
</div>
@endsection