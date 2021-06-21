<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Property;
class RedirectIfNotSharedAndPrivate
{
   protected $auth;

   public function __construct(Guard $auth)
   {
      $this->auth = $auth;
   }

   public function handle($request, Closure $next) 
   {
      $id = $request->route()->getParameter('code');
      $property = Property::findOrFail($id);
      if ($property->isPrivate) {
         if ($this->auth->check()) {
            if (! is_null( $property->shares->find($this->auth->user()) ) || $property->user == $this->auth->user() )
               return $next($request);
            return redirect('/properties/regular');      
         }
         return redirect('/properties/regular');
      }
      return $next($request);      
   }
}
