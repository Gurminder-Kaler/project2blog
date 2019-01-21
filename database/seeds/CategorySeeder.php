<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cat = new App\Category([
            'id'=>random_int(1,15),
            'name'=>str_random(8)
        ]);
        $cat->save();

        $cat = new App\Category([
            'id'=>random_int(1,15),
            'name'=>str_random(8)
        ]);
        $cat->save();

        $cat = new App\Category([
            'id'=>random_int(1,15),
            'name'=>str_random(8)
        ]);
        $cat->save();

        $cat = new App\Category([
            'id'=>random_int(1,15),
            'name'=>str_random(8)
        ]);
        $cat->save();

        $cat = new App\Category([
            'id'=>random_int(1,15),
            'name'=>str_random(8)
        ]);
        $cat->save();

        $cat = new App\Category([
            'id'=>random_int(1,15),
            'name'=>str_random(8)
        ]);
        $cat->save();

    }
}
