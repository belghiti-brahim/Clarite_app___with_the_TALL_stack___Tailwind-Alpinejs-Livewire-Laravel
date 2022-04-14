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


        Responsibility::create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => $userid,
            'color' => $responsibilitycolor,
        ]);

        return redirect()->route('dashboard')->with('message', 'Ta nouvelle responsabilité a été crée avec succès');
    }



    public function render()
    {
        return view('livewire.create-responsibility-form');
    }
}
