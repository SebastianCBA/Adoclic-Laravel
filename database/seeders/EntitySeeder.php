<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entity;
use App\Models\Category;
use Faker\Factory as Faker;
use DB;
use Str;
class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $api = $faker->word;
            $slug = Str::slug($api);
            DB::table('entities')->insert([
                'api' => $api,
                'description' => $api." descripción", 
                'link' => 'entity/'.$slug, 
                'category_id' => $faker->numberBetween(1, 2), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
