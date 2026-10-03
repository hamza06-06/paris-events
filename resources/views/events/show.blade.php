<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>{{ $event->title }} - Paris Events</title>
</head>

<body>

    <a href="{{ route('events.index') }}">
        ← Retour aux événements
    </a>

    <h1>{{ $event->title }}</h1>

    <p>
        <strong>Catégorie :</strong>
        {{ $event->category }}
    </p>

    <p>
        <strong>Date :</strong>
        {{ $event->event_date }}
    </p>

    <p>
        <strong>Lieu :</strong>
        {{ $event->location }}
    </p>

    <p>
        <strong>Adresse :</strong>
        {{ $event->address }}
    </p>

    <h2>Description</h2>

    <p>
        {{ $event->description }}
    </p>

</body>
</html>