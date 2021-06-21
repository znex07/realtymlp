<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\UnitsImage;
class SeedUnitsImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $data = [

            'unit_image1' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-1BR-Layout.jpg',
                'status' => '1'
            ],

            'unit_image2' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Floor7thAmenities-blowup-Layout.jpg',
                'status' => '0'
            ],

            'unit_image3' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Floor7thAmenities-Layout.jpg',
                'status' => '0'
            ],

            'unit_image4' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Floor8thAmenities-Layout.jpg',
                'status' => '0'
            ],

            'unit_image5' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Floor8thAmenities-left-Layout.jpg',
                'status' => '0'
            ],

            'unit_image6' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Floor8thAmenities-Right-Layout.jpg',
                'status' => '0'
            ],

            'unit_image7' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Floor8th-Layout.jpg',
                'status' => '0'
            ],

            'unit_image8' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Floor9th-32nd-Layout.jpg',
                'status' => '0'
            ],

            'unit_image9' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Floor33rd-34th-Layout.jpg',
                'status' => '0'
            ],

            'unit_image10' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Amenity-Lobby.jpg',
                'status' => '0'
            ],

            'unit_image11' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Amenity-Lobby02.jpg',
                'status' => '0'
            ],

            'unit_image12' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-Amenity-Lobby03.jpg',
                'status' => '0'
            ],

            'unit_image13' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-2BR-Layout.jpg',
                'status' => '1'
            ],

            'unit_image14' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '2',
                'img_path' => '/img/uploads/AirResidences-2BR-wBalcony-Layout.jpg',
                'status' => '0'
            ],
            'unit_image15' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Floor7thAmenities-blowup-Layout.jpg',
                'status' => '0'
            ],

            'unit_image16' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Floor7thAmenities-Layout.jpg',
                'status' => '0'
            ],

            'unit_image17' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Floor8thAmenities-Layout.jpg',
                'status' => '0'
            ],

            'unit_image18' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Floor8thAmenities-left-Layout.jpg',
                'status' => '0'
            ],

            'unit_image19' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Floor8thAmenities-Right-Layout.jpg',
                'status' => '0'
            ],

            'unit_image20' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Floor8th-Layout.jpg',
                'status' => '0'
            ],

            'unit_image21' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Floor9th-32nd-Layout.jpg',
                'status' => '0'
            ],

            'unit_image24' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Floor33rd-34th-Layout.jpg',
                'status' => '0'
            ],

            'unit_image25' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Amenity-Lobby.jpg',
                'status' => '0'
            ],

            'unit_image26' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Amenity-Lobby02.jpg',
                'status' => '0'
            ],

            'unit_image27' => [
                'type' => '2',
                'branch_code' => '1',
                'units_code' => '3',
                'img_path' => '/img/uploads/AirResidences-Amenity-Lobby03.jpg',
                'status' => '0'
            ],

            //units_asten

            'unit_image28' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Studio-1.jpg',
                'status' => '1'
            ],
            'unit_image29' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Studio-2.jpg',
                'status' => '0'
            ],
            'unit_image30' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Amenity8.jpg',
                'status' => '0'
            ],
            'unit_image31' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Amenity1.jpg',
                'status' => '0'
            ],
            'unit_image32' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Amenity2.jpg',
                'status' => '0'
            ],
            'unit_image33' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Amenity3.jpg',
                'status' => '0'
            ],
            'unit_image34' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Amenity4.jpg',
                'status' => '0'
            ],
            'unit_image35' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Amenity5.jpg',
                'status' => '0'
            ],
            'unit_image36' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Amenity6.jpg',
                'status' => '0'
            ],
            'unit_image37' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '4',
                'img_path' => '/img/uploads/Asten-Amenity7.jpg',
                'status' => '0'
            ],

            'unit_image38' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-1BR-1.jpg',
                'status' => '1'
            ],
            'unit_image39' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-1BR-2.jpg',
                'status' => '0'
            ],
            'unit_image40' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity8.jpg',
                'status' => '0'
            ],
            'unit_image41' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity1.jpg',
                'status' => '0'
            ],
            'unit_image42' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity2.jpg',
                'status' => '0'
            ],
            'unit_image43' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity3.jpg',
                'status' => '0'
            ],
            'unit_image44' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity4.jpg',
                'status' => '0'
            ],
            'unit_image45' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity5.jpg',
                'status' => '0'
            ],
            'unit_image46' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity6.jpg',
                'status' => '0'
            ],
            'unit_image47' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity7.jpg',
                'status' => '0'
            ],

            'unit_image48' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-2BR-1.jpg',
                'status' => '1'
            ],
            'unit_image49' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-2BR-2.jpg',
                'status' => '0'
            ],
            'unit_image50' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-Amenity8.jpg',
                'status' => '0'
            ],
            'unit_image51' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-Amenity1.jpg',
                'status' => '0'
            ],
            'unit_image52' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-Amenity2.jpg',
                'status' => '0'
            ],
            'unit_image53' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-Amenity3.jpg',
                'status' => '0'
            ],
            'unit_image54' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-Amenity4.jpg',
                'status' => '0'
            ],
            'unit_image55' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-Amenity5.jpg',
                'status' => '0'
            ],
            'unit_image6' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '5',
                'img_path' => '/img/uploads/Asten-Amenity6.jpg',
                'status' => '0'
            ],
            'unit_image57' => [
                'type' => '2',
                'branch_code' => '2',
                'units_code' => '6',
                'img_path' => '/img/uploads/Asten-Amenity7.jpg',
                'status' => '0'
            ],

            //at san lazaro
            'unit_image58' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '7',
                'img_path' => '/img/uploads/SanLorenzo-Studio-1.jpg',
                'status' => '1'
            ],
            'unit_image59' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '7',
                'img_path' => '/img/uploads/SanLorenzo-Studio-2.jpg',
                'status' => '0'
            ],
            'unit_image60' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '7',
                'img_path' => '/img/uploads/SanLorenzo-Amenity1.jpg',
                'status' => '0'
            ],
            'unit_image61' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '7',
                'img_path' => '/img/uploads/SanLorenzo-Amenity2.jpg',
                'status' => '0'
            ],
            'unit_image62' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '7',
                'img_path' => '/img/uploads/SanLorenzo-Amenity3.jpg',
                'status' => '0'
            ],
            'unit_image63' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '7',
                'img_path' => '/img/uploads/SanLorenzo-Amenity4.jpg',
                'status' => '0'
            ],
            'unit_image64' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '7',
                'img_path' => '/img/uploads/SanLorenzo-Amenity5.jpg',
                'status' => '0'
            ],

            'unit_image65' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '8',
                'img_path' => '/img/uploads/SanLorenzo-1BR-1.jpg',
                'status' => '1'
            ],
            'unit_image66' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '8',
                'img_path' => '/img/uploads/SanLorenzo-1BR-1.jpg',
                'status' => '0'
            ],
            'unit_image67' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '8',
                'img_path' => '/img/uploads/SanLorenzo-Amenity1.jpg',
                'status' => '0'
            ],
            'unit_image68' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '8',
                'img_path' => '/img/uploads/SanLorenzo-Amenity2.jpg',
                'status' => '0'
            ],
            'unit_image69' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '8',
                'img_path' => '/img/uploads/SanLorenzo-Amenity3.jpg',
                'status' => '0'
            ],
            'unit_image70' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '8',
                'img_path' => '/img/uploads/SanLorenzo-Amenity4.jpg',
                'status' => '0'
            ],
            'unit_image71' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '8',
                'img_path' => '/img/uploads/SanLorenzo-Amenity5.jpg',
                'status' => '0'
            ],

            'unit_image72' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '9',
                'img_path' => '/img/uploads/SanLorenzo-2BR-1.jpg',
                'status' => '1'
            ],
            'unit_image73' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '9',
                'img_path' => '/img/uploads/SanLorenzo-2BR-1.jpg',
                'status' => '0'
            ],
            'unit_image74' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '9',
                'img_path' => '/img/uploads/SanLorenzo-Amenity1.jpg',
                'status' => '0'
            ],
            'unit_image75' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '9',
                'img_path' => '/img/uploads/SanLorenzo-Amenity2.jpg',
                'status' => '0'
            ],
            'unit_image76' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '9',
                'img_path' => '/img/uploads/SanLorenzo-Amenity3.jpg',
                'status' => '0'
            ],
            'unit_image77' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '9',
                'img_path' => '/img/uploads/SanLorenzo-Amenity4.jpg',
                'status' => '0'
            ],
            'unit_image78' => [
                'type' => '2',
                'branch_code' => '3',
                'units_code' => '9',
                'img_path' => '/img/uploads/SanLorenzo-Amenity5.jpg',
                'status' => '0'
            ],


        ];

        foreach($data as $i => $img)
        {
            UnitsImage::create([
                'type' => $img['type'],
                'branch_code' => $img['branch_code'],
                'units_code' => $img['units_code'],
                'img_path' => $img['img_path'],
                'status' => $img['status']
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
