<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterViewResponse as RegisterViewResponseContract;
use Illuminate\Http\Response;

class RegisterViewResponse implements RegisterViewResponseContract
{
    public function toResponse($request)
    {
        return response()->view('auth.register');
    }
}
