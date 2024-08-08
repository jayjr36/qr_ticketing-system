<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 col-6">
        <h2>Create Ticket</h2>

        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ticket_id">Ticket ID</label>
                <input type="text" class="form-control" id="ticket_id" name="ticket_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate Ticket</button>
        </form>
    </div>
</body>
</html>
