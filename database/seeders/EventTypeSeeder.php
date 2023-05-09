<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Webinar',
                'description' => 'Webinar is a seminar conducted over the internet.',
            ],
            [
                'name' => 'Workshop',
                'description' => 'Workshop is a meeting at which a group of people engage in intensive discussion and activity on a particular subject or project.',
            ],
            [
                'name' => 'Investor Gathering',
                'description' => 'Investor Gathering is a meeting of people for a particular purpose, especially for formal discussion.',
            ]
        ])->each(function ($eventType) {
            $eventType = \App\Models\EventType::create($eventType);
            Event::factory()->count(5)->create([
                'event_type_id' => $eventType->id
            ]);
        });
    }
}
