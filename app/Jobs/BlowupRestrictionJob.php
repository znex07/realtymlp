<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Property;
class BlowupRestrictionJob extends Job implements SelfHandling
{
   protected $data;

   public function __construct(array $data)
   {
      $this->data = $data;
   }

   public function handle(Property $property)
   {
      $data = $this->data;
      $property = $data['property'];
      
      $user = auth()->user();

      if ($data['view_from'] == BLOWUP_FROM_AFFILIATE && auth()->check()) {
         $user = $property->shares()->find(auth()->user()->id);
         return $user->pivot;
      }
      else if ($data['view_from'] == BLOWUP_FROM_AFFILIATE_OWN && auth()->check()) {
         $affiliate = $user->affiliates()->find($data['affiliate_id']);
         $user = $property->shares()->find($affiliate->id);
         return $user->pivot;
      }
      elseif ($data['view_from'] == BLOWUP_FROM_GROUP && auth()->check()) {
         $group = $property->groups()->find($data['group_id']);
         return $group->pivot;
      }
   }
}
