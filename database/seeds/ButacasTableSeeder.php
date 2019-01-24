<?php

use App\Repositories\ButacaRepository;
use Illuminate\Database\Seeder;

class ButacasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repository = app(ButacaRepository::class);

        for ($row = 1; $row < 6; $row++) {
            for ($col = 1; $col < 11; $col++) {

                // adding
                $repository->firstOrCreate([
                    'key' => "${row}-${col}",
                    'col' => $col,
                    'row' => $row
                ]);

            }

        }

    }
}
