<?php

namespace App\Http\Livewire;

use App\Models\Action;
use App\Models\Project;
use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;

class CreateActionForm extends Component
{

    public $project;
    public $actionDescription;
    public $definitonOfDone;
    public $projectName;
    public $status;
    public $deadline;
    public $action;

    public function mount(Project $project, $action)
    {
        $this->project = $project;
        $this->action = null;


        if ($action) {
            $this->action = $action;

            $this->actionDescription = $this->action->description;
            $this->definitonOfDone = $this->action->definition_of_done;
            $this->projectName = $action->project;
            $this->status = $this->action->context_id;
            $this->deadline = $this->action->deadline;
        }
    }


    public function submit()
    {
        $this->validate([
            "actionDescription" => "required",
            "definitonOfDone" => "required",
            "deadline" => "required"

        ]);


        if (!$this->status) {
            $actionStatus = 1;
        } else {
            $actionStatus = $this->status;
        }
        $newAction = [
            'description' => $this->actionDescription,
            'definition_of_done' => $this->definitonOfDone,
            'project_id' => $this->project->id,
            'context_id' => $actionStatus,
            'deadline' => $this->deadline,
        ];



        if ($this->action) {
            $updatedAction = [
                'description' => $this->actionDescription,
                'definition_of_done' => $this->definitonOfDone,
                'project_id' => $this->action->project_id,
                'context_id' => $actionStatus,
                'deadline' => $this->deadline,
            ];
            $editedAction = Action::find($this->action->id);
            $editedAction->update($updatedAction);
            $editedAction->save();
            $projectid = $editedAction->project_id;
            redirect()->route('showProject', $projectid)->with('message', 'Your action has been successfully updated');
        } else {
            $newCreatedAction = Action::create($newAction);
            $projectid = $this->project->id;
            redirect()->route('showProject', $projectid)->with('message', 'Your new action has been successfully created');
        }
    }

    public function render()
    {
        $project = $this->project;
        return view('livewire.create-action-form', compact("project"));
    }
}
