<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::factory()->count(10)->create();
        $users->each(function ($user){
            $user->event_participant()->attach(\App\Models\Event::all()->random()->id);
        });
    }
}
