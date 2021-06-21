<?php

use Illuminate\Database\Seeder;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<=100; $i++):
            DB::table('requirements')
                ->insert([
                    'user_id' => 2,
                    'listing_type' => '2',
                    'condition_type' => '1',
                    'availability_type' => '2',
                    'property_classification' => '',
                    'property_type' => 'Dorm / Pension House Unit',
                    'location' => '{"location1":"Balagtas  , Bulacan"}',
                    'brgy' => 'branggy',
                    'street_address' => 'street',
                    'budget_min' => 2500,
                    'budget_max' => 7000,
                    'rooms' => 2,
                    'bathrooms' => 2,
                    'parking' => 2,
                    'balcony' => 2,
                    'notes' => $faker->sentence,
                    'visibility' => 1,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
        endfor;
       
    }
}
