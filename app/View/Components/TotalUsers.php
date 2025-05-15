<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Role;

class TotalUsers extends Component
{
    public $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function render(): View|Closure|string
    {
        return view('components.total-users', [
            'users' => $this->role->users()->take(4)->get(),
            'moreCount' => max(0, $this->role->users()->count() - 4),
        ]);
    }
}
