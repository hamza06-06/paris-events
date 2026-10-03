<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Event::create([
            'title' => 'Concert Jazz à Paris',
            'category' => 'Concert',
            'description' => 'Une soirée jazz avec plusieurs artistes au cœur de Paris.',
            'location' => 'New Morning',
            'address' => '7-9 Rue des Petites Écuries, 75010 Paris',
            'event_date' => '2026-10-10 20:00:00',
            'image_url' => null,
        ]);

         Event::create([
            'title' => 'Exposition Art Numérique',
            'category' => 'Exposition',
            'description' => 'Une exposition immersive consacrée à l’art numérique.',
            'location' => 'Atelier des Lumières',
            'address' => '38 Rue Saint-Maur, 75011 Paris',
            'event_date' => '2026-10-12 14:00:00',
            'image_url' => null,
        ]);

        Event::create([
           'title' => 'Match de Football',
           'category' => 'Sport',
           'description' => 'Une rencontre de football dans un grand stade parisien.',
           'location' => 'Parc des Princes',
           'address' => '24 Rue du Commandant Guilbaud, 75016 Paris',
           'event_date' => '2026-10-15 20:45:00',
           'image_url' => null,
        ]);

        Event::create([
            'title' => 'Pièce de théâtre contemporaine',
            'category' => 'Théâtre',
            'description' => 'Une pièce contemporaine présentée dans un théâtre parisien.',
            'location' => 'Théâtre de Paris',
            'address' => '15 Rue Blanche, 75009 Paris',
            'event_date' => '2026-10-18 20:30:00',
            'image_url' => null,
        ]);

        Event::create([
            'title' => 'Festival de musique',
            'category' => 'Concert',
            'description' => 'Une programmation musicale variée avec plusieurs artistes.',
            'location' => 'La Villette',
            'address' => '211 Avenue Jean Jaurès, 75019 Paris',
            'event_date' => '2026-10-20 18:00:00',
            'image_url' => null,
        ]);

        Event::create([
            'title' => 'Exposition Photographie',
            'category' => 'Exposition',
            'description' => 'Une sélection de photographies contemporaines.',
            'location' => 'Maison Européenne de la Photographie',
            'address' => '5 Rue de Fourcy, 75004 Paris',
            'event_date' => '2026-10-22 10:00:00',
            'image_url' => null,
        ]);
    }
}
