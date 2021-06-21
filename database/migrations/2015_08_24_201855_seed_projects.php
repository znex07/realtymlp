<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Projects;

class SeedProjects extends Migration
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

            'project1' => [
                'developer_id' => '1',
                'name' => 'Air Residences',
                'type' => 'Residential Condominium',
                'municipality' => 'Makati City',
                'description' => 'Conveniently located in the country’s financial center, Air Residences is just across Ayala Avenue Extension corner Yakal and Malugay Streets. It is just a few steps away from the office skyscraper RCBC Plaza and several minutes away from the central business district as well as unique dining and retail areas and other places of importance.',
                'sub_description' => 'The contemporary luxurious one-tower, 59-storey development offers equally magnificent amenities to residents and guests including swimming pools, a pool island, a yoga lawn, a spa, play areas, sports terrace and a barbecue terrace among others. A 24-hour security service is guaranteed while its facilities include 12 elevators, a semi-addressable fire protection and alarm system, generator sets for common areas and selected residential outlets.
Offering unit cuts ranging from studio to two-bedroom homes and set for turnover in 2020, experience the advantages and ease of living within walking distance from the trendiest shopping, dining, and lifestyle destinations only at Air Residences.'
            ],
            'project2' => [
                'developer_id' => '2',
                'name' => 'Avida Towers Asten',
                'type' => 'Residential Condominium',
                'municipality' => 'Makati City',
                'description' => "A three-tower high-rise residential condominium located along Yakal and Malugay Streets, Avida Towers Asten brings its residents closer to the Makati Central Business District and at the same time, provides easy access to the city's creative hub.
    The project guarantees 24/7 security service and its amenities include swimming pools, a pool lounge, a game room, an indoor gym, a clubhouse, and a sky lounge in addition to its proximity to an array of retail and dining selections.
    Available in studio, one-bedroom, and two-bedroom units, Avida Towers Asten is designed to suit its residents' dynamic lifestyle.",
                'sub_description' => "WHAT'S IN THE UNIT

    Deliverable Units: Standard Finish; Units are telephone, cable, internet ready; All units are equipped with smoke detectors
    Flooring: Ceramic Tiles
    Ceiling: Concrete Slab (Painted)
    Windows: Aluminum Windows
    Walls: Unit Partition - Precast Walls (Painted) ; Interior Partition - Gypsum Board (Painted);T&B - Ceramic tiles and Precast Walls (Painted)
    Kitchen: Kitchen Sink Base, Complete Kitchen Fixtures, Overhead and Under sink Cabinets, Grease Trap
    Toilet and Bath: Complete T&B Fixture, Mechanical Ventilation
"
            ],
            'project3' => [
                'developer_id' => '2',
                'name' => 'Avida Towers San Lorenzo',
                'type' => 'Residential Condominium',
                'municipality' => 'Makati City',
                'description' => "Situated along Chino Roces Avenue, Avida Towers San Lorenzo offers affordable units that give residents access to the Makati Central Business District and various key places in the city.
The Avida Towers San Lorenzo has premium amenities including an infinity pool, an outside gym, and a clubhouse plus a 24-hour security and fire protection and alarm system to ensure safety at all times.
Studio, one-bedroom, and two-bedroom units are available and each unit provides residents an ideal living space where they can enjoy relaxing moments while appreciating the city’s scenic skyline.",
                'sub_description' => "WHAT'S IN THE UNIT


Painted Walls
Interior Partition
Ceramic Tiles
Complete Toilet and Bath
Kitchen Sink with Grease Trap
Laminated Countertop with Under Sink and Overhead Cabinets
Utility Area for 1BR and 2BR
Flat Slab for Ceilings
Aluminum Framed Windows
BUILDING AMENITIES

Club House
Swimming Pool
Playground and Gazebo
Outdoor Gym
Centralized Water Supply
High Level of Security
Sewage Treatment Plant
FACILITIES AND SERVICES

Main Lobby
Mailbox for each unit
Three Elevator Units for each Tower
Adequate Emergency Power
Fire Protection/ Alarm System
Telephone, Cable, Internet (WiFi) Ready on Amenity Area only
Garbage Chute"
            ],
        ];

        foreach($data as $p=>$project)
        {
            Projects::create([
                'developer_id' => $project['developer_id'],
                'name' => $project['name'],
                'type' => $project['type'],
                'municipality' => $project['municipality'],
                'description' => $project['description'],
                'sub_description' => $project['sub_description']
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
