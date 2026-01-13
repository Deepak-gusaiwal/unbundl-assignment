<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Login extends Component
{
    public $emailOrName = '', $password = '';
    public function login()
    {
        $data = $this->validate([
            'emailOrName' => 'required|string',
            'password' => 'required|string',
        ]);
        try {
            $user = User::where('email', $this->emailOrName)
                ->orWhere('name', $this->emailOrName)
                ->first();
            if ($user && Auth::attempt(['email' => $user->email, 'password' => $this->password])) {
                request()->session()->regenerate();
                Toaster::success('Login successful');
                return redirect()->route('admin.dashboard');
            } else {
                Toaster::error('Invalid credentials');
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            Toaster::error($e->getMessage());
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
