<?php

namespace App\Http\Livewire;

use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowResponbilities extends Component
{
    public function remove($ResponsibilityId)
    {
        $Responsibility = Responsibility::find($ResponsibilityId);
        $Responsibility->delete();
    }

    public function render()
    {
        $user = Auth::user();
        $userId = $user->id;
        $responsibilities = Responsibility::with("users")->where("user_id", "=", $userId)->get();
        return view('livewire.show-responbilities', compact("responsibilities"));
    }
}
