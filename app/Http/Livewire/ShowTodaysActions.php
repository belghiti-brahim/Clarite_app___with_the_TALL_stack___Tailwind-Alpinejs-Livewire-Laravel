<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Action;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowTodaysActions extends Component
{
    public $listeners = ['new-action' => '$refresh'];
    public $confirmingActionDeletion = false;
    public $dropy = false;


    public function deleteAction($confirmingActionDeletion)
    {
        $action = Action::find($confirmingActionDeletion);
        $action->delete();
        $this->confirmingActionDeletion = false;
    }
    public function removeAction($id)
    {
        $this->confirmingActionDeletion = $id;
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
        $today = Carbon::today()->toDateString();
        $authid = Auth::user()->id;
        $actions = Action::select('actions.*')
            ->where('deadline', '=', $today)
            ->latest()
            ->join('projects', 'projects.id', '=', 'actions.project_id')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->get();
        return view('livewire.show-todays-actions', compact("actions", "today"));
    }
}
