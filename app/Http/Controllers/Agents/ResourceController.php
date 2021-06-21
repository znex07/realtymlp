<?php

namespace App\Http\Controllers\agents;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\User\AffiliateRequest;

use App\Http\Controllers\Controller;
use App\Jobs\User\AddAffiliate;
use App\Jobs\User\RemoveAffiliate;
use App\Jobs\User\ConfirmAffiliate;
use App\Jobs\User\RejectAffiliate;

class ResourceController extends Controller
{
    public function postRemove(AffiliateRequest $request)
    {
      $result = $this->dispatch(new RemoveAffiliate($request));
      return [
        'result' => $result,
      ];
    }

    public function postAdd(AffiliateRequest $request)
    {
      $result = $this->dispatch(new AddAffiliate($request));
      return [
        'result' => $result,
      ];
    }

    public function postReject(AffiliateRequest $request)
    {
      $result = $this->dispatch(new RejectAffiliate($request));
      return [
        'result' => $result,
      ];
    }

    public function postAccept(AffiliateRequest $request)
    {
      $result = $this->dispatch(new ConfirmAffiliate($request));
      return [
        'result' => $result,
      ];
    }

    // public function postCancel(AffiliateRequest $request)
    // {
    //   $result = $this->dispatch(new RejectAffiliate($request));
    //   return [
    //     'result' => $result,
    //   ];
    // }
}
