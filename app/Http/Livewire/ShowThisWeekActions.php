<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Action;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowThisWeekActions extends Component
{
    public function remove($actionId)
    {
        $action = Action::find($actionId);
        $action->delete();
    }
    
    public function render()
    {
        $today = Carbon::today();
        $todayy = Carbon::today()->toDateString();
        $weeknumber = Carbon::today()->week();

        $authid = Auth::user()->id;
        $actions = Action::select('actions.*')
            ->join('projects', 'projects.id', '=', 'actions.project_id')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->get();

        $monday = $today->startOfWeek()->toDateString();
        $tueasday = $today->addDay(1)->toDateString();
        $wednesday = $today->addDay(1)->toDateString();
        $thursday = $today->addDay(1)->toDateString();
        $friday = $today->addDay(1)->toDateString();
        $saturday = $today->addDay(1)->toDateString();
        $sunday = $today->endOfWeek()->toDateString();

        $mondayactions = $actions->where('deadline', '=', $monday);
        $tueasdayactions = $actions->where('deadline', '=', $tueasday);
        $wednesdayactions = $actions->where('deadline', '=', $wednesday);
        $thursdayactions = $actions->where('deadline', '=', $thursday);
        $fridayactions = $actions->where('deadline', '=', $friday);
        $saturdayactions = $actions->where('deadline', '=', $saturday);
        $sundayactions = $actions->where('deadline', '=', $sunday);
        return view('livewire.show-this-week-actions', compact("todayy", "actions", "mondayactions", "tueasdayactions", "wednesdayactions", "thursdayactions", "fridayactions", "saturdayactions", "sundayactions"));
    }
}
