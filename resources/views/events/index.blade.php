<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paris Events</title>
</head>

<body>

    <h1>Paris Events</h1>

    <form method="GET" action="{{ route('events.index') }}">

        <input
            type="text"
            name="search"
            placeholder="Rechercher un événement..."
            value="{{ request('search') }}"
        >

        <select name="category">

            <option value="">
                Toutes les catégories
            </option>

            @foreach ($categories as $category)

                <option
                    value="{{ $category }}"
                    @selected(request('category') === $category)
                >
                    {{ $category }}
                </option>

            @endforeach

        </select>

        <button type="submit">
            Rechercher
        </button>

        <a href="{{ route('events.index') }}">
            Réinitialiser
        </a>

    </form>

    <hr>

    @if ($events->isEmpty())

        <p>Aucun événement trouvé.</p>

    @else

        @foreach ($events as $event)

            <div>

                <h2>{{ $event->title }}</h2>

                <p>
                    <strong>Catégorie :</strong>
                    {{ $event->category }}
                </p>

                <p>
                    <strong>Lieu :</strong>
                    {{ $event->location }}
                </p>

                <p>
                    <strong>Date :</strong>
                    {{ $event->event_date }}
                </p>

            </div>

            <hr>

        @endforeach

    @endif

</body>
</html>