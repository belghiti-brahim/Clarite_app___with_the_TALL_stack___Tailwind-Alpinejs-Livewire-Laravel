<?php

namespace App\Http\Livewire;

use App\Models\Action;
use App\Models\Project;
use Livewire\Component;

class CreateActionForm extends Component
{

    public $project;
    public $actionDescription;
    public $definitonOfDone;
    public $status;
    public $deadline;

    public function mount(Project $project)
    {
        $this->project = $project;
        // $this->actionDescription = $actionDescription;
        // $this->definitonOfDone = $definitonOfDone;
        // $this->status = $status;
        // $this->deadline = $deadline;
    }

    public function submit()
    {
        if (!$this->status) {
            $actionStatus = 1;
        } else {
            $actionStatus = $this->status;
        }

        $newOrUpdatedAction = [
            'description' => $this->actionDescription,
            'definition_of_done' => $this->definitonOfDone,
            'project_id' => $this->project->id,
            'deadline' => $this->deadline,
        ];

        $newAction = Action::create($newOrUpdatedAction);

        $newAction->contexts()->attach($actionStatus);
        $projectid = $this->project->id;

        redirect()->route('showProject', $projectid)->with('message', 'Your new action has been successfully created');
    }

    public function render()
    {
        $project = $this->project;
        return view('livewire.create-action-form', compact("project"));
    }
}
