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
    public $project;

    public function mount(Responsibility $responsibility, $project)
    {
        $this->responsibility = $responsibility;
        $this->project = null;


        if ($project) {
            $this->project = $project;
            $this->projectName = $this->project->name;
            $this->projectDescription = $this->project->definition;
            $this->parentProjectName = $this->project->project_id;
        }
    }

    public function submit()
    {

        $this->validate(
            [
                "projectName" => 'required',
                "projectDescription" => 'required',
            ]
        );

        if ($this->parentProjectName === "undefined") {
            $parentProject = null;
        } else {
            $parentProject  = $this->parentProjectName;
        }

        $newOrUpdatedProject =   [
            "name" => $this->projectName,
            "definition" => $this->projectDescription,
            "responsibility_id" => $this->responsibility->id,
            "project_id" => $parentProject
        ];

        if ($this->project) {
            Project::find($this->project->id)->update($newOrUpdatedProject);
        } else {
            Project::create($newOrUpdatedProject);
        }
        $id = $this->responsibility->id;
        redirect()->route('showresponsibility', $id)->with('message', 'Ta nouvelle responsabilité a été crée avec succès');
    }

    public function render()
    {
        return view('livewire.create-project-form');
    }
}
