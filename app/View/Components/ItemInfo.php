<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemInfo extends Component
{
    public $name;
    public $image;
    public $code;
    public $barcode;
    public $initials;

    public function __construct($name, $image = null, $code = null, $barcode = null)
    {
        $this->name = $name;
        $this->image = $image;
        $this->code = $code;
        $this->barcode = $barcode;

        if ($this->image) {
            if (file_exists(public_path($this->image))) {
                $this->initials = imageShow($this->image);
            }
        }
        if (empty($this->initials)) {
            $this->initials = strtoupper(substr($this->name, 0, 1) . substr($this->name, strpos($this->name, ' ') + 1, 1));
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.item-info', [
            'name' => $this->name,
            'image' => $this->image,
            'code' => $this->code,
            'barcode' => $this->barcode,
            'initials' => $this->initials,
        ]);
    }
}
