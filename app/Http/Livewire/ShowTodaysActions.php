<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Action;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowTodaysActions extends Component
{
    public function remove($actionId)
    {
        $action = Action::find($actionId);
        $action->delete();
    }

    public function startAction($actionId)
    {
        $action = Action::find($actionId);
        $status = 2;
        $action->contexts()->sync($status);
    }

    public function actionIsDone($actionId)
    {
        $action = Action::find($actionId);
        $status = 3;
        $action->contexts()->sync($status);
    }

    public function render()
    {
        $today = Carbon::today()->toDateString();
        $authid = Auth::user()->id;
        $actions = Action::select('actions.*')
            ->where('deadline', '=', $today)
            ->join('projects', 'projects.id', '=', 'actions.project_id')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->get();
        return view('livewire.show-todays-actions', compact("actions", "today"));
    }
}
