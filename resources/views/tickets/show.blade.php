<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Ticket</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 col-6">
        <h2>Ticket Details</h2>

        <div class="form-group">
            <label for="ticket_id">Ticket ID:</label>
            <input type="text" class="form-control" id="ticket_id" value="{{ $ticket->ticket_id }}" readonly>
        </div>

        <div class="form-group">
            <label>QR Code:</label>
            <div>{!! $qrCode !!}</div>
        </div>
        {{-- <a href="{{ route('tickets.downloadQrCode', $ticket->id) }}" class="btn btn-primary">Download QR Code</a> --}}

        <a href="{{ route('tickets.create') }}" class="btn btn-secondary">Create Another Ticket</a>
    </div>
</body>
</html>
