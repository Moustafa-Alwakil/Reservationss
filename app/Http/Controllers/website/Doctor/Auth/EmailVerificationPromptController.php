<?php

namespace App\Http\Controllers\Website\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class EmailVerificationPromptController extends Controller
{
        /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::INDEX)
                    : view('website.verify-email');
    }
}
