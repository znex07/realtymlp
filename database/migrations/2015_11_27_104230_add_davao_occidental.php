<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Location;
class AddDavaoOccidental extends Migration
{
    
    public function up()
    {
        $data = [
            'Davao Occidental' => [
                'Don Marcelino',
                'Jose Abad Santos (Trinidad)',
                'Malita',
                'Santa Maria',
                'Saranggani'
            ]
        ];

        foreach ($data as $k=>$v) {
            Location::create([
                'id' => 1690,
                'type' => 1,
                'parent_id' => 0,
                'name' => $k
            ]);
            foreach ($v as $_v) {
                Location::create([
                    'type' => 2,
                    'parent_id' => 1690,
                    'name' => $_v
                ]);
            }
        }
    }
    
    public function down()
    {
        $data = Location::where('parent_id',1690)->get();
        foreach ($data as $d) {
            $d->delete();
        }
        $dav = Location::find(1690);
        $dav->delete();
    }
}
