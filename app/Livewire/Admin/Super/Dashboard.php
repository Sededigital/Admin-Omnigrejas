<?php

namespace App\Livewire\Admin\Super;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Dashboard Admin')]
#[Layout('components.layouts.app')]
class Dashboard extends Component
{
    public function render()
    {



        return view('system.admin.super-admin.dashboard');
    }
}
