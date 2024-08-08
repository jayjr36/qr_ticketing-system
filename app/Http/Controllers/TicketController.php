<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class TicketController extends Controller
{
    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|unique:tickets',
        ]);

        $ticket = Ticket::create([
            'ticket_id' => $request->ticket_id,
        ]);

        return redirect()->route('tickets.show', $ticket->id);
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        $qrCode = QrCode::size(250)->generate($ticket->ticket_id);

        return view('tickets.show', compact('ticket', 'qrCode'));
    }

    public function downloadQrCode($id)
    {
        $ticket = Ticket::findOrFail($id);
        $qrCode = QrCode::format('png')->size(250)->generate($ticket->ticket_id);

        $filename = 'ticket_' . $ticket->id . '.png';

        return Response::stream(
            function () use ($qrCode) {
                echo $qrCode;
            },
            200,
            [
                'Content-Type' => 'image/png',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"'
            ]
        );
    }
}
