<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    /**
     * Haal alleen tickets op die nog niet zijn voltooid (completed_at is null).
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Toon het formulier voor het aanmaken van een nieuw ticket.
     */
    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        try {
            // Validatie van de input: de titel is verplicht, omschrijving is optioneel.
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            // Maak een nieuw ticket aan met de opgegeven gegevens.
            Ticket::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('tickets.index')->with('success', 'Ticket aangemaakt!');
        } catch (\Exception $e) {
            // Log de foutmelding als er een exception optreedt.
            Log::error('Fout bij het aanmaken van een ticket: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is een fout opgetreden bij het opslaan van het ticket.');
        }
    }

    /**
     * // Toon de details van een specifiek ticket
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Toon het formulier voor het bewerken van een ticket.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Werk een bestand ticket bij met validatie en logging.
     */
    public function update(Request $request, Ticket $ticket)
    {
        try {
            // Validatie van de input: de titel is verplicht.
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            // Update het ticket met de nieuwe gegevens.
            $ticket->update($request->only(['title', 'description']));
            return redirect()->route('tickets.index')->with('success', 'Ticket bijgewerkt!');
        } catch (\Exception $e) {
            // Log de foutmelding als er een exception optreedt.
            Log::error('Fout bij het bijwerken van een ticket: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is een fout opgetreden bij het bijwerken van het ticket.');
        }
    }

    /**
     * Verwijder een ticket uit de database met logging.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket verwijderd!');
    }

    /**
     * Markeer een ticket als voltooid en bewaar de voltooiingstijd.
     */
    public function complete(Ticket $ticket)
    {
        try {
            // Update het ticket met de huidige datum/tijd als voltooiingstijd.
            $ticket->update(['completed_at' => now()]);
            return redirect()->route('tickets.index')->with('success', 'Ticket voltooid!');
        } catch (\Exception $e) {
            Log::error('Fout bij het voltooien van een ticket: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is een fout opgetreden bij het voltooien van het ticket.');
        }
    }
}