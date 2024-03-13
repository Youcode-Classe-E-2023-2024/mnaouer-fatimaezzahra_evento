<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket with Image</title>
    <style>
        .ticket {
            width: 300px;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .ticket-image {
            width: 100%;
            border-radius: 10px 10px 0 0;
            margin-bottom: 10px;
        }

        .ticket-content {
            text-align: center;
        }

        .ticket-title {
            font-size: 1.2em;
            margin-bottom: 5px;
        }

        .ticket-description {
            color: #666;
            margin-bottom: 10px;
        }

        .ticket-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .ticket-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="ticket">
{{--    <img class="ticket-image" src="{{ 'http://127.0.0.1:8000' . $event->picture }}" alt="Ticket Image">--}}
    <div class="ticket-content">
        <h2 class="ticket-title">{{ $event->title }}</h2>
        <p class="ticket-description">{{ \Illuminate\Support\Str::limit($event->description, 150, $end='...') }}</p>
        <button class="ticket-button">{{ $user->name }}</button>
        <p class="ticket-description">{{ 'serie: ' . \Illuminate\Support\Str::random(20) }}</p>
    </div>
</div>

</body>
</html>
