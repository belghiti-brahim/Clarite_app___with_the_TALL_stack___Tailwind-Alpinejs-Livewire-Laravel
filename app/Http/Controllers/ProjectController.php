<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
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
}
