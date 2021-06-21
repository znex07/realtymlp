<?php

namespace App\Http\Controllers\Dashboard\Affiliates;

use App\Affiliate_Log;
use App\Http\Controllers\Controller;
use App\Jobs\User\GetAffiliates;
use Illuminate\Support\Facades\Input;
use App\User;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex(Input $input)
    {
        
        $user = auth()->user();
        $data = $this->dispatch(new GetAffiliates('index'));
        $data['affiliates'] = $data['affiliates']->by('user_fname', 'desc');
        $data['affiliates'] = $data['affiliates']->paginate();
        $data['newMessage'] = sizeof($user->newMessage);

        return view('main.dashboard.affiliates.index')
            ->with($data);
    }

    public function getNew()
    {
        $user = auth()->user();
        $data = $this->dispatch(new GetAffiliates('new'));
        $data['newMessage'] = sizeof($user->newMessage);
        return view('main.dashboard.affiliates.index')
            ->with($data);
    }

    public function getSorted(Input $input)
    {
    }

    public function remove() {
        $data = Input::all();
        $aff_id = $data['aff_id'];

        $user = User::with(['affiliates'])->findOrFail($aff_id);
        $user->affiliates()->detach(auth()->user()->id);

        $auth = User::with(['affiliates'])->findOrFail(auth()->user()->id);
        $auth->affiliates()->detach($aff_id);
    }

}
