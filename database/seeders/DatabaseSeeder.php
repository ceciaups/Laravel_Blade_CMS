<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\Entry;
use App\Models\Career;
use App\Models\CareerType;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Project::truncate();
        CareerType::truncate();
        Career::truncate();
        Skill::truncate();
        
        User::factory()->count(2)->create();
        Skill::factory()->count(4)->create();
        Project::factory()->count(4)->create()->each(function($project) {
            $skills = Skill::all()->random(rand(1,3))->pluck('id');
            $project->skills()->attach($skills);
        });
        CareerType::factory()->count(2)->create();
        Career::factory()->count(4)->create()->each(function($career) {
            $skills = Skill::all()->random(rand(1,2))->pluck('id');
            $career->skills()->attach($skills);
        });
            
    }
}
