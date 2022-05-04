<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        return view("pages.projects.index_all_projects");
    }

    public function archivedProjects()
    {
        $archive = "arcived projects";
        return view("pages.projects.archived_projects", compact("archive"));
    }

    public function createFromResponsibility($id)
    {
        $responsibility = Responsibility::find($id);
        return view('pages.projects.create_project_from_responsibility', compact("responsibility"));
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $responsibility = Responsibility::find($project->responsibility->id);
        return view("pages.projects.edit_project", compact('project', 'responsibility'));
    }

    public function show($id)
    {
        $project = Project::find($id);
        $actions = Action::where("project_id", "=", $project->id)->get();
        return view("pages.projects.show_project", compact("project", "actions"));
    }
}
