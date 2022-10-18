<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymImagesSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gym_images')->insert($this->getData());
    }
    public function getData(): array {
        $gym_images = [];

        for ($i = 0; $i < 120; $i++) {

            $gym_images[] = [
                'id' => $i + 1,
                'gym_id' => rand(1,20),
                'image' => 'https://fitness-cccp.ru/wp-content/uploads/2017/05/11-832x522.jpg',
                'created_at' => now('Europe/Moscow')
                ];
        }

        return $gym_images;


    }
}