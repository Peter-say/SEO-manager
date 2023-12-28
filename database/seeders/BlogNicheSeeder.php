<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogNiche;
use Illuminate\Database\Seeder;

class BlogNicheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niches = [
            [
                'id' => 1,
                'name' => 'Marketing',
            ],
            [
                'id' => 2,
                'name' => 'Blogging',
            ],
            [
                'id' => 3,
                'name' => 'Travelling',
            ],
            [
                'id' => 4,
                'name' => 'Health',
            ],
            [
                'id' => 5,
                'name' => 'Others',
            ],
        ];

        foreach ($niches as $niche) {
            BlogNiche::create($niche);
        }
    }
}
