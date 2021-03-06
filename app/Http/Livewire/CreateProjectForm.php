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
            $this->projectName = $this->project->project_name;
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

        if ($this->parentProjectName === 'null') {
            $parentProject = null;
        } else {
            $parentProject  = $this->parentProjectName;
        }

        $newOrUpdatedProject =   [
            "project_name" => $this->projectName,
            "definition" => $this->projectDescription,
            "responsibility_id" => $this->responsibility->id,
            "project_id" => $parentProject
        ];

        $id = $this->responsibility->id;
        if ($this->project) {
            $selectedProject = Project::find($this->project->id);
            $selectedProject->update($newOrUpdatedProject);
            redirect()->route('showresponsibility', $id)->with('message', 'Your project has been successfully updated');

        } else {
            Project::create($newOrUpdatedProject);
            redirect()->route('showresponsibility', $id)->with('message', 'Your new project has been successfully created');

        }
    }

    public function render()
    {
        return view('livewire.create-project-form');
    }
}
