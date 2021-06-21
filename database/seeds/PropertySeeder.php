<?php

use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'property_code' => str_random(10),
            'listing_type' => '2',
            'condition_type' => '1',
            'ownership_type' => str_random(10),
            'availability_type' => 2,
            'property_title' => str_random(10),
            'property_classifications' => 1,
            'property_types' => '9',
            'province' => 1,
            'province_title' => 'Metro Manila',
            'city' => 16,
            'city_title' => 'San Fernando',
            'brgy' => '28',
            'street_address' => str_random(10),
            'village' => str_random(10),
            'google_lang' => str_random(10),
            'google_lat' => str_random(10),
            'map_options' => '{"marker_type":"","lat":14.554729,"lng":121.02444519999995,"zoom":15,"marker_scale":100}',
            'floor_area' => 1,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'parking' => 1,
            'balcony' => 1,
            'property_price' => '1500',
            'rental_price' => '10000',
            'rental_stat' => 'per_month',
            'selling_price' => '1500000',
            'selling_stat' => 'gross',
            'description' => str_random(10),
            'user_id' => 2,
            'property_status' => '1',
            'property_stat' => '',
            'sharables' => '{"attachments":{"documents":[],"images":[]},"details":{"description":true,"floor_area":true,"bathrooms":true,"parking":true,"rooms":true,"balcony":true},"locations":{"brgy":true,"street_address":true,"village":true,"maps":false}}',
            'files_metadata' => '{"remaining_mb":2000000}',
            'tagging' => '',
            'personal_notes' => str_random(10),
            'visibility' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        $listings = \App\UserSubscribe::where('id', 2)->pluck('listings');
        DB::table('user_subscribe')->where('id', '=', 2)->update(['listings' => $listings + 1]);
    }
}
