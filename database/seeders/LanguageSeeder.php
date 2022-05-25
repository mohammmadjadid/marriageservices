<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'name' =>'arabic'
            ),
            array(
                'name' =>'english'
            )
        );

        language::create($data);
    }
}
