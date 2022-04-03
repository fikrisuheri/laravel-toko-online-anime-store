<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $id;
    public $type;
    public $name;
    public $value;
    public $isRequired;
    public $hintText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label = "",
        $id = "",
        $type = "text",
        $name = "",
        $value = "",
        $isRequired = false,
        $hintText = null
    )
    {
        $this->label = $label;
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->isRequired = $isRequired;
        $this->hintText = $hintText;
    }

  
    public function render()
    {
        return view('components.forms.input');
    }
}
