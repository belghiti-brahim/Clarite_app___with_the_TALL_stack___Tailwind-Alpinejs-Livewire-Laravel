<?php

namespace App\View\Components;

use Illuminate\View\Component;

class icon extends Component
{
     public $imgPath;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imgPath)
    {
        $this->imgPath = $imgPath;
 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon');
    }
}
