<?php

namespace App\Http\Middleware;

use App\Property_Log;
use Closure;
use App\Property;
class RedirectIfGroupAndNoGroupIdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route()->getParameter('code');
        if ($request->has('view_from')) {
            if ($request->input('view_from') == BLOWUP_FROM_GROUP) {
                if ($request->has('group_id')) {
                    return $next($request);
                }
//               dd($request);
                return redirect('/properties/regular');
            }
            return $next($request);
        }

    }
}
