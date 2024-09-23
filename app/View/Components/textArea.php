<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textArea extends Component
{
    public $value;
    public $rows;
    /**
     * Create a new component instance.
     */
    public function __construct($value = '', $rows = 4)
    {
        $this->value = $value;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-area');
    }
}
