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
    public $active;

    public function mount(Responsibility $responsibility, $archive)
    {
        $this->responsibility = $responsibility;
        $this->archive = $archive;
    }

    public function remove($projectId)
    {
        $project = Project::find($projectId);
        $project->delete();
    }

    public function render()
    {

        if ($this->archive) {
            if ($this->archive === "to test for and show responsibility projects") {
                $responsibilityId =  $this->responsibility->id;
                $projects = Project::with("responsibility")->where('responsibility_id', '=', $responsibilityId)->with("children")->whereNull('project_id')->orderBy('archive', 'desc')->orderBy('created_at', 'desc')->paginate(9);
            } else {
                $authid = Auth::user()->id;
                $projectss = Project::select('projects.*')
                    ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
                    ->join('users', 'users.id', '=', 'responsibilities.user_id')
                    ->where('user_id', $authid);
                $projects = $projectss->where("archive", "=", "0")->with("children")->whereNull('project_id')->orderBy('created_at', 'desc')->paginate(0);
            }
        } else {
            $authid = Auth::user()->id;
            $projectss = Project::select('projects.*')
                ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
                ->join('users', 'users.id', '=', 'responsibilities.user_id')
                ->where('user_id', $authid);
            $projects = $projectss->where("archive", "=", "1")->with("children")->whereNull('project_id')->orderBy('created_at', 'desc')->paginate(0);
        }

        return view('livewire.show-projects', compact("projects"));
    }
}
