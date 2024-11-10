<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function index()
    {
        return inertia('Auth/VerifyEmail');
    }

    public function verify(EmailVerificationRequest $request)
    {
        // fulfill() will call the markEmailAsVerified method on the authenticated user
        // and dispatch the Illuminate\Auth\Events\Verified event
        $request->fulfill();

        return redirect()->route('listing.index')
            ->with('success', 'Email was verified!');
    }

    public function notify(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    }
}
