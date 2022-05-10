<?php

namespace App\Http\Livewire;

use App\Models\Action;
use App\Models\Project;
use Livewire\Component;

class EditActionForm extends Component
{

    public $project;
    public $action;

    public function mount(Project $project, Action $action)
    {
        $this->project = $project;
        $this->action = $action;
    }
    public function render()
    {
        return view('livewire.edit-action-form');
    }
}
