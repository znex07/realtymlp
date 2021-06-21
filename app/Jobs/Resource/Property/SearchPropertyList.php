<?php

namespace App\Jobs\Resource\Property;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Property;
use App\LocationProperty;
use DB;
class SearchPropertyList extends Job implements SelfHandling
{
    private $request;
    public function __construct($request)
    {
      $this->request = $request;
    }

    public function handle()
    {
      $data = [
        'qry' => $this->request->input('query'),
        'column' => '',
      ];
      $locations = Property::where('property_status',1)->where(function($query) use (&$data) {

        $query->where(function($query) use (&$data) {
          $result = $query->where('street_address', 'like', $data['qry'].'%')->groupBy('city');
          if ($result->get()->count())
            $data['column'] = 'street_address';
        })->orWhere(function($query) use (&$data) {
          $result = $query->where('brgy', 'like', $data['qry'].'%')->groupBy('city');
          if ($result->get()->count())
            $data['column'] = 'brgy';
        })->orWhere(function($query) use (&$data) {
          $result = $query->where('village', 'like', $data['qry'].'%')->groupBy('city');
          if ($result->get()->count())
            $data['column'] = 'village';
        })
        ->orWhere(function($query) use (&$data) {
          $result = $query->where('city_title', 'like', $data['qry'].'%')->groupBy('city');
          if ($result->get()->count())
            $data['column'] = 'city'; 
        })
        ->orWhere(function($query) use (&$data) {
          $result = $query->where('province_title', 'like', $data['qry'].'%')->groupBy('city');
          if ($result->get()->count())
            $data['column'] = 'province';
        });
      });

      $results = [
        'locations' => $locations->get(),
        'column' => $data['column']
      ];

      return $results;
    }
}
