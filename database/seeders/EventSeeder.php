<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title'=>'MDC Intramurals',
                'Schedule' => 'October 10, 2023',
                'venue' => 'Mater Dei College',
                'computation' => 'Averaging'
            ],
            [
                'title'=>'MDC Intramurals',
                'Schedule' => 'October 10, 2023',
                'venue' => 'Mater Dei College',
                'computation' => 'Ranking'

            ],
            [
                'title'=>'MDC Intramurals',
                'Schedule' => 'October 10, 2023',
                'venue' => 'Mater Dei College',
                'computation' => 'Complex'

            ]
        ];

        foreach($events as $event) {
            Event::create($event);
        }
    }
}
