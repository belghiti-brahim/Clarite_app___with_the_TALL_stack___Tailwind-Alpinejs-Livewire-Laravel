<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeUserLanguage extends Component
{

    public $userLanguage;
    public function render()
    {
        return view('livewire.change-user-language');
    }
    public function changeLanguage()
    {
        $user = Auth::user();
        if ($this->userLanguage == null) {
            $selectedLanguage = $user->language;
        } else {
            $selectedLanguage = $this->userLanguage;
        }
        $user->language = $selectedLanguage;
        $user->save();
        // dd($selectedLanguage);
        return redirect()->to(url()->previous());
    }
}
