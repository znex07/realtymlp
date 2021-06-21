<?php

namespace App\Jobs\Sharing;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;
use App\Group;
use App\Property;

class ShareJob extends Job implements SelfHandling
{
    private $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $user = auth()->user();
        $request = $this->request;
        if ($request->input('share_type') === 'affiliate') {
            if($request->input('type_share') === 'affiliate')
            {
                foreach($request->input('id') as $idd)
                {
                    $checkedSharing = $user
                        ->confirmedAffiliates()
                        ->find($idd)
                        ->shares()
                        ->find($request->input('property_id'));
                }
                if ($checkedSharing) {
                    return [
                        'property' => $checkedSharing,
                        'hit' => true,
                        'sharable_data' => $checkedSharing->sharable_data,
                    ];

                }
            }
            if($request->input('type_share') === 'group')
            {
                $checkedSharing = $user
                    ->confirmedAffiliates()
                    ->find($request->input('id'))
                    ->shares()
                    ->find($request->input('property_id'));
                if ($checkedSharing) {
                    return [
                        'property' => $checkedSharing,
                        'hit' => true,
                        'sharable_data' => $checkedSharing->sharable_data,
                    ];
                }
            }


        }
        elseif ($request->input('share_type') === 'group') {
            if($request->input('type_share') === 'affiliate')
            {
                foreach($request->input('id') as $idd)
                {
                    $checkedSharing = $user
                        ->joinedgroups()
                        ->find($idd)
                        ->properties()
                        ->find($request->input('property_id'));
                }

                if ($checkedSharing) {
                    return [
                        'property' => $checkedSharing,
                        'hit' => true,
                        'sharable_data' => $checkedSharing->sharable_data,
                    ];

                }
            }
            if($request->input('type_share') === 'group')
            {
                $checkedSharing = $user
                    ->joinedgroups()
                    ->find($request->input('id'))
                    ->properties()
                    ->find($request->input('property_id'));

                if ($checkedSharing) {
                    return [
                        'property' => $checkedSharing,
                        'hit' => true,
                        'sharable_data' => $checkedSharing->sharable_data,
                    ];
                }
            }


        }


        return [
            'property' => $user->properties()->find($request->input('property_id')),
            'hit' => false,
            'sharable_data' => $user->properties()->find($request->input('property_id')),
//            'sharable_data' => $user->properties()->find($request->input('property_id'))->sharable_data,
        ];
    }
}   
