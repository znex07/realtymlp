<?php
namespace App\Http\Controllers\Resource\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AvatarRequest;
use App\Jobs\User\ChangeAvatar;
use App\Jobs\User\SearchUserList;
use App\Jobs\User\SearchAffiliates;
use App\Jobs\User\SearchNonAffiliate;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function postUpload(AvatarRequest $request, $user)
    {
        $dispatched = $this->dispatch(new ChangeAvatar($request, $user));
        // if ($user) {
        return redirect()->back();
        // }

        return redirect()->back()->withErrors([
            'User not found',
        ]);
    }

    public function getSearch(Request $request)
    {
        $result = $this->dispatch(new SearchUserList($request));
        return [
            'data' => $result,
        ];
    }

    public function getSearchNonAffiliate(Request $request)
    {
        $result = $this->dispatch(new SearchNonAffiliate($request));
        return [
            'data' => $result,
        ];
    }

    public function getSearchedAffiliates(Request $request)
    {
        $result = $this->dispatch(new SearchAffiliates($request));
        return [
            'data' => $result
        ];
    }

}
