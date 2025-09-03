<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public function isActive($routes)
    {
        if (is_array($routes)) {
            return request()->routeIs($routes);
        }
        return request()->routeIs($routes);
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
