<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criterias = [
            [
                'contest_id' => 1,
                'criteria'=>'Test',
                'description' => 'Test',
                'weight' => 50,
            ],
            // [
            //     'contest_id' => 1,
            //     'name'=>'Vocal Duet',
            //     'description' => 'Duet',
            //     'weight' => 50,
            // ],
        ];

        foreach($criterias as $criteria) {
            Criteria::create($criteria);
        }
    }
}
