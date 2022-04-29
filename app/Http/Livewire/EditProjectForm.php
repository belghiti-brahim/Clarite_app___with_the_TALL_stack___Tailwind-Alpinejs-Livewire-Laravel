<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Responsibility;
use Livewire\Component;

class EditProjectForm extends Component
{

    public $responsibility;
    public $project;

    public function mount(Responsibility $responsibility, Project $project)
    {
        $this->responsibility = $responsibility;
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.edit-project-form');
    }
}
