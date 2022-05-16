<?php

namespace App\Http\Livewire;

use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowResponbilities extends Component
{

    public $confirmingResponsibilityDeletion = false;
    public function removeResponsibility($id)
    {
        $this->confirmingResponsibilityDeletion = $id;
    }

    public function render()
    {
        $user = Auth::user();
        $userId = $user->id;
        $responsibilities = Responsibility::with("users")->where("user_id", "=", $userId)->get();
        return view('livewire.show-responbilities', compact("responsibilities"));
    }
    public function deleteResponsibility($confirmingResponsibilityDeletion)
    {
        $responsibility = Responsibility::find($confirmingResponsibilityDeletion);
        $responsibility->delete();
        $this->confirmingResponsibilityDeletion = false;
    }
}
