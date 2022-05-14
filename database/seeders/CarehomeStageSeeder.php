<?php

namespace Database\Seeders;

use App\Models\CarehomeStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarehomeStageSeeder extends Seeder
{
    private $carehomeStages = [
        'RxIN',
        'RxENDORSED',
        'RxBIODOSED',
        'PICKED',
        'PODDED',
        'CHECKED',
        'FINALCHECKED',
        'DELIVERED'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->carehomeStages as $stage){
            $newStage = new CarehomeStage();
            $newStage->stage_name = $stage;
            $newStage->save();
        }
    }
}
