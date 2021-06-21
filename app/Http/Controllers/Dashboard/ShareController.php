<?php

namespace App\Http\Controllers\Dashboard;

use App\FilePic;
use App\Jobs\Resource\Share\JobGetUsers;
use App\Property;
use App\Property_User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\Resource\SharingRequest;
use App\Jobs\Resource\Share\RemoveShareJob;
use App\Jobs\Resource\Share\UpdateShareJob;
use App\Jobs\Resource\Share\JobShare;
use App\Jobs\Sharing\ShareJob;

class ShareController extends Controller
{
    public function getIndex()
    {
        return view('main.dashboard.share');
    }
    public function getUsers(){
        $value = Input::all();
        $users = $this->dispatch(new JobGetUsers($value));
        return $users;
    }
    
    public function share(SharingRequest $request)
    {
        $data = $this->dispatch(new JobShare($request->input()));
        return $data;
    }
    public function shareaff(Request $request, Property $property)
    {
        $shareduser = auth()->user();
        $id = $request->get('id');
        $owner = $request->get('owner');
        $answer = $request->get('answer');
        $categories = $request->get('categories');
        $sharables = $request->get('sharables');
        $ownership_type = '';
//        $prop_check_share = Property_User::where('property_id','=',$id)->where('user_fullname','!=',$owner)->count();
        $last_share = Property_User::select('ownership_id')->where('property_id','=',$id)->where('ownership_id','>',0)->orderBy('created_at','desc')->pluck('ownership_id');
        $prop_check_share = Property_User::where('property_id','=',$id)->where('user_fullname','=',$shareduser->full_name)->count();
        if ($prop_check_share == 0)
        {
            $last_share+=1;
        }
        else
        {
            $last_share='';
        }

        if($request->get('type') == 'affiliate')
        {
            if($last_share == 1)
            {
                $last_share+=$categories;
                if($last_share == 0)
                {
                    $last_share = 0;
                    $ownership_type='I am direct to the owner';
                }
                elseif ($last_share == 1)
                {
                    $last_share = 1;
                    $ownership_type='I am one broker away';
                }
                elseif ($last_share == 2)
                {
                    $last_share = 2;
                    $ownership_type='I am two brokers away';
                }
                elseif ($last_share == 3)
                {
                    $last_share = 3;
                    $ownership_type='I am three brokers away';
                }
                elseif ($last_share == 4)
                {
                    $last_share = 4;
                    $ownership_type='I am four brokers away';
                }
                elseif ($last_share == 5)
                {
                    $last_share = 5;
                    $ownership_type='I am five brokers away';
                }
                elseif ($last_share == 6)
                {
                    $last_share = 6;
                    $ownership_type='I am six brokers away';
                }
                elseif ($last_share == 7)
                {
                    $last_share = 7;
                    $ownership_type='I am seven brokers away';
                }
                elseif ($last_share == 8)
                {
                    $last_share = 8;
                    $ownership_type='I am eight brokers away';
                }
                elseif ($last_share == 9)
                {
                    $last_share = 9;
                    $ownership_type='I am nine brokers away';
                }
                elseif ($last_share == 10)
                {
                    $last_share = 10;
                    $ownership_type='I am ten brokers away';
                }
                $property = $property->find($id);
                $property->shares()->attach([$answer => ['sharables'=> $sharables,'user_fullname'=>$shareduser->full_name,'ownership_type'=>$ownership_type,'ownership_id'=>$last_share]]);
            }
            else
                {
                    if($last_share == 0)
                    {
                        $last_share = 0;
                        $ownership_type='I am direct to the owner';
                    }
                    elseif ($last_share == 1)
                    {
                        $last_share = 1;
                        $ownership_type='I am one broker away';
                    }
                    elseif ($last_share == 2)
                    {
                        $last_share = 2;
                        $ownership_type='I am two brokers away';
                    }
                    elseif ($last_share == 3)
                    {
                        $last_share = 3;
                        $ownership_type='I am three brokers away';
                    }
                    elseif ($last_share == 4)
                    {
                        $last_share = 4;
                        $ownership_type='I am four brokers away';
                    }
                    elseif ($last_share == 5)
                    {
                        $last_share = 5;
                        $ownership_type='I am five brokers away';
                    }
                    elseif ($last_share == 6)
                    {
                        $last_share = 6;
                        $ownership_type='I am six brokers away';
                    }
                    elseif ($last_share == 7)
                    {
                        $last_share = 7;
                        $ownership_type='I am seven brokers away';
                    }
                    elseif ($last_share == 8)
                    {
                        $last_share = 8;
                        $ownership_type='I am eight brokers away';
                    }
                    elseif ($last_share == 9)
                    {
                        $last_share = 9;
                        $ownership_type='I am nine brokers away';
                    }
                    elseif ($last_share == 10)
                    {
                        $last_share = 10;
                        $ownership_type='I am ten brokers away';
                    }
                    $property = $property->find($id);
                    $property->shares()->attach([$answer => ['sharables'=> $sharables,'user_fullname'=>$shareduser->full_name,'ownership_type'=>$ownership_type,'ownership_id'=>$last_share]]);
                }


        }
        elseif($request->get('type') == 'group')
        {
            $property = $property->find($id);
            $property->groups()->attach($answer);
        }

    }

    public function getSharable(Request $request)
    {
        $sharables = $this->dispatch(new ShareJob($request));
        return $sharables;
    }

    public function detach(Request $request)
    {
        $data = $request->input();
        $dispatched = $this->dispatch(new RemoveShareJob($data));
        return response()->json(['success'=>true,'property'=>$dispatched]);
    }
    public function update(Request $request)
    {
        $data = $request->input();
        $dispatched = $this->dispatch(new UpdateShareJob($data));
        return $dispatched;  
    }
}
