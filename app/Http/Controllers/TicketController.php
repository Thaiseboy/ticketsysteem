<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    /**
     * Haal alle tickets op die nog niet zijn voltooid (waar 'completed_at' null is).
     * Geeft de index view terug met een lijst van onvoltooide tickets.
     */
    public function index()
    {
        // Haal alle tickets op.
        $tickets = Ticket::whereNull('completed_at')->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Toon het formulier voor het aanmaken van een nieuw ticket.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Sla een nieuw ticket op in de database met validatie en foutafhandeling.
     */
    public function store(Request $request)
    {
        try {
            // Validatie van de gebruikersinput: titel is verplicht, omschrijving is optioneel.
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            // Maak een nieuw ticket aan met de gevalideerde input.
            Ticket::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            // Redirect naar de indexpagina met een succesbericht.
            return redirect()->route('tickets.index')->with('success', 'Ticket aangemaakt!');
        } catch (\Exception $e) {
            // Log de exception voor foutopsporing en geef een foutmelding aan de gebruiker.
            Log::error('Fout bij het aanmaken van een ticket: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is een fout opgetreden bij het opslaan van het ticket.');
        }
    }

    /**
     * Toon de details van een specifiek ticket.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Toon het formulier voor het bewerken van een bestaand ticket.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Werk een bestaand ticket bij met validatie, logging en foutafhandeling.
     */
    public function update(Request $request, Ticket $ticket)
    {
        try {
            // Validatie van de input: de titel is verplicht en moet een string zijn.
            $request->validate([
                'title' => 'required|string|max:255',
            ]);

            // Update het ticket met de gevalideerde gegevens.
            $ticket->update($request->only(['title', 'description']));

            // Redirect naar de indexpagina met een succesbericht.
            return redirect()->route('tickets.index')->with('success', 'Ticket bijgewerkt!');
        } catch (\Exception $e) {
            // Log de exception en geef een foutmelding terug aan de gebruiker.
            Log::error('Fout bij het bijwerken van een ticket: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is een fout opgetreden bij het bijwerken van het ticket.');
        }
    }

    /**
     * Verwijder een ticket uit de database en geef een succesbericht.
     */
    public function destroy(Ticket $ticket)
    {
        try {
            // Verwijder het ticket uit de database.
            $ticket->delete();
            return redirect()->route('tickets.index')->with('success', 'Ticket verwijderd!');
        } catch (\Exception $e) {
            // Log de exception en geef een foutmelding terug aan de gebruiker.
            Log::error('Fout bij het verwijderen van een ticket: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is een fout opgetreden bij het verwijderen van het ticket.');
        }
    }

    /**
     * Markeer een ticket als voltooid door de 'completed_at' datum in te stellen.
     */
    public function complete(Ticket $ticket)
    {
        try {
            // Update het ticket met de huidige datum/tijd als voltooiingstijd.
            $ticket->update(['completed_at' => now()]);

            // Redirect naar de indexpagina met een succesbericht.
            return redirect()->route('tickets.index')->with('success', 'Ticket voltooid!');
        } catch (\Exception $e) {
            // Log de exception en geef een foutmelding terug aan de gebruiker.
            Log::error('Fout bij het voltooien van een ticket: ' . $e->getMessage());
            return redirect()->back()->withErrors('Er is een fout opgetreden bij het voltooien van het ticket.');
        }
    }
}