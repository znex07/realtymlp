<?php

namespace App\Jobs\Resource\Share;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use DB;
class UpdateShareJob extends Job implements SelfHandling
{
    private $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $data = $this->data;
        // $row = DB::table('property_user')
        //         ->where('property_id', $data['property_id'])
        //         ->where('user_id', $data['user_id'])
        //         ->update(['sharables' => json_encode($data['sharables'])]);
        $user = auth()->user();
//        dd($data);
        $property = $user->properties()->findOrFail($data['property_id']);
        if ($data['share_type'] === 'affiliate') {
            $property
                ->shares()
                ->updateExistingPivot($data['id'], ['sharables' => $data['sharables']]);
        }
        elseif ($data['share_type'] === 'group') {
            $property
                ->groups()
                ->updateExistingPivot($data['id'], ['sharables' => $data['sharables']]);
        }
    }
}
