<?php

namespace Database\Seeders;

use App\Models\Computation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $compus = [
            [
                'name' => 'Averaging',
                'description' => "Involves adding up all the individual scores and then 
                                dividing the sum by the total number of scores. The result obtained
                                represents the average or mean score of the dataset."
            ],
            [
                'name' => 'Ranking',
                'description' => "The system determines the relative positions or ranks of participants based on their
                                performance or scores."
            ],
            [
                'name'=>'Complex',
                'description' => "This type of computation requires a minimum of five judges."
            ]
        ];

        foreach($compus as $compu) {
            Computation::create($compu);
        }
    }
}
