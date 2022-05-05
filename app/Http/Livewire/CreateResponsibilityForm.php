<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;

class CreateResponsibilityForm extends Component
{

    public $name;
    public $description;
    public $color;
    public $responsibility;



    public function mount($responsibility)
    {
        $this->responsibility = null;
        if ($responsibility) {

            $this->responsibility = $responsibility;
            $this->name = $this->responsibility->name;
            $this->description = $this->responsibility->description;
            $this->color = $this->responsibility->color;
        }
    }

    public function submit()
    {
        $userid = Auth::user()->id;

        $this->validate([

            'name' => 'required',
            'description' => 'required',

        ]);
        if ($this->color == null) {
            $responsibilitycolor = "#37ace6ff";
        } else {
            $responsibilitycolor =  $this->color;
        }

        $newOrUpdatedResponsibility = [
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => $userid,
            'color' => $responsibilitycolor,
        ];


        if ($this->responsibility) {
            Responsibility::find($this->responsibility->id)->update($newOrUpdatedResponsibility);
            return redirect()->route('dashboard')->with('message', 'Your responsibility has been successfully updated');

        } else {
            Responsibility::create(
                $newOrUpdatedResponsibility
            );
            return redirect()->route('dashboard')->with('message', 'Your new responsibility has been successfully created');
        }
    }



    public function render()
    {
        return view('livewire.create-responsibility-form');
    }
}
