<?php

namespace Database\Seeders;

use App\Models\Contest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $contests = [
            [
                'event_id' => 1,
                'name'=>'Vocal Solo',
                'description' => 'Vocal Solo',
            ],
            [
                'event_id' => 1,
                'name'=>'Vocal Duet',
                'description' => 'Duet',
            ],
        ];

        foreach($contests as $contest) {
            Contest::create($contest);
        }
    }
}
