<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreatedBy extends Component
{
    public $user;
    public function __construct($createdBy)
    {
        $this->user = $createdBy;
    }

    public function render(): View|Closure|string
    {
        return view('components.created-by', [
            'user' => $this->user,
        ]);
    }
}
