<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Company::class, 10)->create()->each(function ($compamy) {
            // Seed the relation with one address
            $emp = factory(App\Model\Employee::class, 5)->make();
            $compamy->employees()->saveMany($emp);
        });
    }
}
