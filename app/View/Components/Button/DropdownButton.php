<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class DropdownButton extends Component
{
    public $title;
    public function __construct($title)
    {
        $this->title = $title;
    }

  
    public function render()
    {
        return view('components.button.dropdown-button');
    }
}
