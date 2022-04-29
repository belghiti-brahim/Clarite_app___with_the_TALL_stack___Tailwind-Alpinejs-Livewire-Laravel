<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Responsibility;

class CreateProjectForm extends Component
{
    public $responsibility;
    public $projectName;
    public $projectDescription;
    public $parentProjectName;

    public function mount(Responsibility $responsibility)
    {
        $this->responsibility = $responsibility;

        // $this->projectName = $projectName;
        // $this->projectDescription = $projectDescription;
        // $this->parentResponsibilityName = $parentResponsibilityName;
        // $this->parentProjectName = $parentProjectName;
    }

    public function submit()
    {

        $this->validate(
            [
                "projectName" => 'required',
                "projectDescription" => 'required',
                "parentProjectName" => 'required'
            ]
        );

        $newOrUpdatedProject =   [
            "name" => $this->projectName,
            "definition" => $this->projectDescription,
            "responsibility_id" => $this->responsibility->id,
            "project_id" => $this->parentProjectName
        ];

        Project::create($newOrUpdatedProject);
    }

    public function render()
    {
        return view('livewire.create-project-form');
    }
}
