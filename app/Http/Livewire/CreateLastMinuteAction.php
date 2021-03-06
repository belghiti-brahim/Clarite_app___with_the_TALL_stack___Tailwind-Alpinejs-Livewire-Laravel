<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Action;
use App\Models\Project;
use Livewire\Component;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;

class CreateLastMinuteAction extends Component
{
    public $actionDescription;
    public $responsibilities;
    public $projects;
    public $selectedResponsibility = null;
    public $slectedProject = null;

    public function mount()
    {
        $user = Auth::user();
        $userId = $user->id;
        $this->responsibilities = Responsibility::with("users")->where("user_id", "=", $userId)->get();
        $this->projects = collect();
    }

    public function render()
    {
        return view('livewire.create-last-minute-action');
    }

    public function updatedselectedResponsibility($selectedResponsibility)
    {

        $this->projects = Project::where('responsibility_id', "=", $this->selectedResponsibility)->get();
    }


    public function submit()
    {


        $this->validate([
            "actionDescription" => "required",
            "slectedProject" => "required",
        ]);

        $today = Carbon::today()->toDateString();
        $newAction = [
            'description' => $this->actionDescription,
            'definition_of_done' => "to be edited for more details",
            'project_id' => $this->slectedProject,
            'context_id' => 1,
            'deadline' => $today,
        ];
        $newCreatedAction = Action::create($newAction);
        $this->emitUp('new-action');

        $this->actionDescription = "";
        $this->selectedResponsibility = "";
        $this->slectedProject = "";
    
    }
}
