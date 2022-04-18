<?php

namespace App\Http\Livewire;

use App\Models\Responsibility;
use Livewire\Component;

class EditResponsibilityForm extends Component
{
    public $responsibility;

    public function mount(Responsibility $responsibility)
    {
        $this->responsibility = $responsibility;
    }


    public function render()
    {
        return view('livewire.edit-responsibility-form');
    }
}
