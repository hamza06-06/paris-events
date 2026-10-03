<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Paris Events</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<header>
    <div class="container">
        <h1>Paris Events</h1>
        <p>Trouvez facilement des événements culturels et ludiques à Paris.</p>
    </div>
</header>

<main class="container">

    <form
        method="GET"
        action="{{ route('events.index') }}"
        class="filters"
    >

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

        <button type="submit" class="btn">
            Rechercher
        </button>

        <a
            href="{{ route('events.index') }}"
            class="btn btn-secondary"
        >
            Réinitialiser
        </a>

    </form>

    @if ($events->isEmpty())

        <div class="empty-state">
            <p>Aucun événement trouvé.</p>
        </div>

    @else

        <div class="events-grid">

            @foreach ($events as $event)

                <article class="event-card">

                    <span class="category">
                        {{ $event->category }}
                    </span>

                    <h2>
                        {{ $event->title }}
                    </h2>

                    <p>
                        <strong>Lieu :</strong>
                        {{ $event->location }}
                    </p>

                    <p>
                        <strong>Date :</strong>
                        {{ $event->event_date }}
                    </p>

                    <a
                        href="{{ route('events.show', $event) }}"
                        class="details-link"
                    >
                        Voir les détails →
                    </a>

                </article>

            @endforeach

        </div>

    @endif

</main>

</body>
</html>