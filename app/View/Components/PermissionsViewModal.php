<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PermissionsViewModal extends Component
{
    public $role;
    public function __construct($role)
    {
        $this->role = $role;
    }

    public function render(): View|Closure|string
    {
        return view('components.permissions-view-modal', [
            'role' => $this->role,
        ]);
    }
}
