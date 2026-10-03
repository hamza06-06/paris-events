<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $event->title }} - Paris Events</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<header>
    <div class="container">
        <h1>Paris Events</h1>
    </div>
</header>

<main class="container">

    <a
        href="{{ route('events.index') }}"
        class="back-link"
    >
        ← Retour aux événements
    </a>

    <article class="event-detail">

        <span class="category">
            {{ $event->category }}
        </span>

        <h1>
            {{ $event->title }}
        </h1>

        <p>
            <strong>Date :</strong>
            {{ $event->event_date->format('d/m/Y \à H:i') }}
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

    </article>

</main>

</body>
</html>