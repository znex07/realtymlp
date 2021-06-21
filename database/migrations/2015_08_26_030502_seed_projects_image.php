<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\ProjectImages;
class SeedProjectsImage extends Migration
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
            'project_image1' =>
                [
                    'type' => '1',
                    'branch_code' => '1',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/AirResidences-BrandFeature.jpg',
                    'status' => '1'
                ],
            'project_image2' =>
                [
                    'type' => '1',
                    'branch_code' => '1',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/AirResidences-Perspective.jpg',
                    'status' => '0'
                ],
            'project_image3' =>
                [
                    'type' => '1',
                    'branch_code' => '1',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/AirResidences-SiteDevPlan.jpg',
                    'status' => '0'
                ],
            'project_image4' =>
                [
                    'type' => '1',
                    'branch_code' => '1',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/AirResidences-VicinityMap.jpg',
                    'status' => '0'
                ],


            'project_image5' =>
                [
                    'type' => '1',
                    'branch_code' => '2',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/Asten-BrandFeature2.jpg',
                    'status' => '1'
                ],
            'project_image6' =>
                [
                    'type' => '1',
                    'branch_code' => '2',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/Asten-BrandFeature3.jpg',
                    'status' => '0'
                ],
            'project_image7' =>
                [
                    'type' => '1',
                    'branch_code' => '2',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/Asten-BrandFeature4.jpg',
                    'status' => '0'
                ],
            'project_image8' =>
                [
                    'type' => '1',
                    'branch_code' => '2',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/Asten-BrandFeature5.jpg',
                    'status' => '0'
                ],
            'project_image9' =>
                [
                    'type' => '1',
                    'branch_code' => '2',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/Asten-BrandFeature6.jpg',
                    'status' => '0'
                ],


            'project_image10' =>
                [
                    'type' => '1',
                    'branch_code' => '3',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/SanLorenzo-BrandFeature2.jpg',
                    'status' => '1'
                ],
            'project_image11' =>
                [
                    'type' => '1',
                    'branch_code' => '3',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/SanLorenzo-BrandFeature3.jpg',
                    'status' => '0'
                ],
            'project_image12' =>
                [
                    'type' => '1',
                    'branch_code' => '3',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/SanLorenzo-BrandFeature4.jpg',
                    'status' => '0'
                ],
            'project_image13' =>
                [
                    'type' => '1',
                    'branch_code' => '3',
                    'units_code' => '123',
                    'img_path' => '/img/uploads/SanLorenzo-BrandFeature5.jpg',
                    'status' => '0'
                ],
        ];

        foreach($data as $i => $img)
        {
            ProjectImages::create([
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
