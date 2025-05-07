<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserInfo extends Component
{
    public $user;
    public $initials;

    public function __construct($user)
    {
        $this->user = $user;
        $this->initials = collect(explode(' ', $user->name))->map(function ($name) {
            return strtoupper(substr($name, 0, 1));
        })->implode('');
    }

    public function render(): View|Closure|string
    {
        return view('components.user-info', [
            'user' => $this->user,
            'initials' => $this->initials,
        ]);
    }
}
