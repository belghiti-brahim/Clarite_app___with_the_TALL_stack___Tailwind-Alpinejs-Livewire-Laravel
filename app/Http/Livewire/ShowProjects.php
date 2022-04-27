<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;

class ShowProjects extends Component
{

    public $responsibility;
    public $archive;

    public function mount(Responsibility $responsibility, $archive)
    {
        $this->responsibility = $responsibility;
        $this->archive = $archive;

    }

    public function render()
    {
        if ($this->responsibility) {
            $responsibilityId =  $this->responsibility->id;
            $projects = Project::with("responsibility")->where('responsibility_id', '=', $responsibilityId)->get();
        }

        if ($this->archive) {
            $authid = Auth::user()->id;
            $projectss = Project::select('projects.*')
                ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
                ->join('users', 'users.id', '=', 'responsibilities.user_id')
                ->where('user_id', $authid);

            $projects = $projectss->where("archive", "=", "0")->paginate(0);
        } else {
            $authid = Auth::user()->id;
            $projectss = Project::select('projects.*')
                ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
                ->join('users', 'users.id', '=', 'responsibilities.user_id')
                ->where('user_id', $authid);

            $projects = $projectss->where("archive", "=", "1")->paginate(9);
        }
        return view('livewire.show-projects', compact("projects"));
    }
}
