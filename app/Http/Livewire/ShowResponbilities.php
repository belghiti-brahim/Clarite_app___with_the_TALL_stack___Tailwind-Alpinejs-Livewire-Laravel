<?php

namespace App\Http\Livewire;

use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowResponbilities extends Component
{
    public function render()
    {
        $user = Auth::user();
        $userId = $user->id;
        // $responsibilities = Responsibility::where("id", "=", "$userId");
        $responsibilities = Responsibility::all();
        return view('livewire.show-responbilities', compact("responsibilities"));
    }
}
