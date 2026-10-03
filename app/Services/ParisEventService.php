<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ParisEventService
{
    private const API_URL =
        'https://opendata.paris.fr/api/explore/v2.1/catalog/datasets/que-faire-a-paris-/records';

    public function getEvents(?string $search, ?string $category)
    {
        $filters = [
            'date_start >= now()',
        ];

        if ($search) {
            $search = str_replace('"', '\\"', $search);
            $filters[] = 'search(title, "' . $search . '")';
        }

        if ($category) {
            $categoryFilter = $this->categoryFilter($category);

            if ($categoryFilter) {
                $filters[] = $categoryFilter;
            }
        }

        $response = Http::timeout(10)->get(self::API_URL, [
            'where' => implode(' and ', $filters),
            'order_by' => 'date_start asc',
            'limit' => 50,
            'timezone' => 'Europe/Paris',
        ]);

        $response->throw();

        return collect($response->json('results', []))
            ->map(fn ($event) => $this->mapEvent($event));
    }

    public function getEvent(string $id)
    {
        $response = Http::timeout(10)->get(self::API_URL, [
            'where' => 'id = ' . (int) $id,
            'limit' => 1,
            'timezone' => 'Europe/Paris',
        ]);

        $response->throw();

        $record = collect(
            $response->json('results', [])
        )->first();

        if (!$record) {
            return null;
        }

        return $this->mapEvent($record);
    }

    private function mapEvent(array $record): object
    {
        $description =
            $record['description']
            ?? $record['lead_text']
            ?? 'Aucune description disponible.';

        return (object) [
            'id' => $record['id'],

            'title' =>
                $record['title'] ?? 'Sans titre',

            'category' =>
                $this->detectCategory(
                    $record['qfap_tags'] ?? ''
                ),

            'description' =>
                trim(
                    html_entity_decode(
                        strip_tags($description)
                    )
                ),

            'location' =>
                $record['address_name']
                ?? 'Lieu non renseigné',

            'address' =>
                implode(', ', array_filter([
                    $record['address_street'] ?? null,
                    $record['address_zipcode'] ?? null,
                    $record['address_city'] ?? null,
                ])),

            'event_date' =>
                Carbon::parse($record['date_start'])
                    ->setTimezone('Europe/Paris'),

            'image_url' =>
                $record['cover_url'] ?? null,
        ];
    }

    private function detectCategory(string $tags): string
    {
        $tags = Str::lower($tags);

        if (Str::contains($tags, ['concert', 'musique', 'musical'])) {
            return 'Concert';
        }

        if (Str::contains($tags, ['exposition', 'expo'])) {
            return 'Exposition';
        }

        if (Str::contains($tags, [
            'sport',
            'football',
            'basket',
            'tennis',
        ])) {
            return 'Sport';
        }

        if (Str::contains($tags, [
            'théâtre',
            'theatre',
            'spectacle',
            'cirque',
            'humour',
        ])) {
            return 'Théâtre';
        }

        return 'Autre';
    }

    private function categoryFilter(string $category): ?string
    {
        return match ($category) {
            'Concert' =>
                '(search(qfap_tags, "concert") or search(qfap_tags, "musique"))',

            'Exposition' =>
                '(search(qfap_tags, "exposition") or search(qfap_tags, "expo"))',

            'Sport' =>
                'search(qfap_tags, "sport")',

            'Théâtre' =>
                '(search(qfap_tags, "théâtre") or search(qfap_tags, "theatre") or search(qfap_tags, "spectacle"))',

            default => null,
        };
    }
}