<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paris Events</title>
</head>

<body>

    <h1>Paris Events</h1>

    @foreach ($events as $event)
        <div>
            <h2>{{ $event->title }}</h2>

            <p>{{ $event->category }}</p>

            <p>{{ $event->location }}</p>

            <p>{{ $event->event_date }}</p>
        </div>

        <hr>
    @endforeach

</body>
</html>