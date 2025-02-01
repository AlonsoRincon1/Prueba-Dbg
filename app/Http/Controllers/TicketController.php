<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class TicketController extends Controller
{
    
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket')->with('tickets', $tickets);
    }
    public function create()
    {
        return view('welcome'); 
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'usuario_id' => 'required',
        'ubicacion' => 'required',
        'descripcion' => 'required',
        'categoria' => 'required',
    ]);

    $ticket = Ticket::findOrFail($id);
    $ticket->update([
        'usuario_id' => $request->usuario_id,
        'ubicacion' => $request->ubicacion,
        'descripcion' => $request->descripcion,
        'categoria' => $request->categoria,
    ]);

    return redirect()->route('tickets.index')->with('success', 'Ticket actualizado correctamente.');
    }



    public function destroy($id)
    {
    $ticket = Ticket::findOrFail($id);
    $ticket->delete();

    return redirect()->route('tickets.index')->with('success', 'Ticket eliminado correctamente.');
    }

    public function store(Request $request)
    {   
        
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'ubicacion' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
        ]);

        $ticket = Ticket::create([
        'usuario_id' => $request->usuario_id,
        'ubicacion' => $request->ubicacion,
        'descripcion' => $request->descripcion,
        'categoria' => $request->categoria,
    ]);

        return redirect()->route('tickets.create');
    }
}
