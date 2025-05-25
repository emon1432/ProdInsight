<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Permissions extends Component
{
    public array $routeList;
    public function __construct($routeList = [])
    {
        $this->routeList = $routeList;
    }

    public function render(): View|Closure|string
    {
        return view('components.permissions', [
            'routeList' => $this->routeList,
        ]);
    }
}
