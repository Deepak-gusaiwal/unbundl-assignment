<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        // Regenerate the session to prevent session fixation attacks
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Toaster::success('Logout successful');
        return redirect(route('login'));
    }
    public function render()
    {
        return view('livewire.auth.logout');
    }
}
