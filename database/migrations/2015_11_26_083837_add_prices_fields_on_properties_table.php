<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Category;
class AddPricesFieldsOnPropertiesTable extends Migration
{
    public function up()
    {
        $data = [
            'Rent Stat' => ['per sqm','per month'],
            'Sele Stat' => ['per sqm','per whole property']
        ];
        foreach ($data as $key => $value) {
            foreach($value as $v) {
                Category::create([
                    'code'  => 3,
                    'title' => $key,
                    'description' => $v
                ]);
            }
        }

        Schema::table('properties', function(Blueprint $table) {
            $table->string('rental_price',30)->after('property_price');
            $table->string('rental_stat',30)->after('rental_price');
            $table->string('selling_price',30)->after('rental_stat');
            $table->string('selling_stat',30)->after('selling_price');
    });

    }

    public function down()
    {
        $cats = Category::where('code',3)->get();
        foreach ($cats as $cat) {
            $cat->delete();
        }

        Schema::table('properties', function(Blueprint $table) {
            $table->dropColumn('rental_price');
            $table->dropColumn('selling_price');
            $table->dropColumn('rental_stat');
            $table->dropColumn('selling_stat');
        });
    }
}
