<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show user dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();

        return view('profile.dashboard', compact('user'));
    }

    /**
     * Show profile settings page
     */
    public function settings()
    {
        $user = Auth::user();

        return view('profile.settings', compact('user'));
    }
}
