<?php

namespace App\Http\Livewire;

use App\Models\Action;
use App\Models\Project;
use Livewire\Component;

class ShowActionsOfAProject extends Component
{

    public $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function remove($actionId)
    {
        $action = Action::find($actionId);
        $action->delete();
    }

    public function startAction($actionId)
    {
        $action = Action::find($actionId);
        $status = 2;
        $action->context_id = $status;
        $action->save();
    }

    public function actionIsDone($actionId)
    {
        $action = Action::find($actionId);
        $status = 3;
        $action->context_id = $status;
        $action->save();
    }

    public function render()
    {
        $projectId = $this->project->id;
        $actions = Action::where("project_id", "=", $projectId)->get();
        $allActionsCount = $actions->count();
        if ($allActionsCount === 0 ) {
            $projectCompletionRounded = 0;
        } else {
            $doneActions = $actions->where("context_id", "=", "3")->count();
            $projectCompletion = ($doneActions / $allActionsCount) * 100;
            $projectCompletionRounded = (int)$projectCompletion;
        }


        return view('livewire.show-actions-of-a-project', compact("actions", "projectCompletionRounded"));
    }
}
