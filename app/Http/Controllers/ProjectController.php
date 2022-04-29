<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        return view("pages.projects.indexallprojects");
    }

    public function archivedProjects()
    {
        $archive = "arcived projects";
        return view("pages.projects.archivedprojects", compact("archive"));
    }
    public function createwithinresponsibility($id)
    {
        $responsibility = Responsibility::find($id);
        return view('pages.projects.create_project_from_responsibility', compact("responsibility"));
    }
}
