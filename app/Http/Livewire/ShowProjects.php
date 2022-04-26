<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Responsibility;

class ShowProjects extends Component
{

    public $responsibility;

    public function mount(Responsibility $responsibility)
    {
        $this->responsibility = $responsibility;
    

    }

    public function render()
    {

        $responsibilityId =  $this->responsibility->id;
        $projects = Project::with("responsibility")->where('responsibility_id', '=', $responsibilityId )->get();

        return view('livewire.show-projects', compact("projects"));
    }
}
