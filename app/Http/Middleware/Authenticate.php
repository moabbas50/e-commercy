<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null :  route('welcome');
        if (!$request->expectsJson()) {

            session()->flash('status', 'You Should Login First Before Do This Action!');


            return route('login');
        }
    }
}

// with('errMessage','You Should Login First Before Do This Action')
