<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Dashboard Admin Igrejas')]
#[Layout('components.layouts.app')]
class Dashboard extends Component
{
    public function mount(){

    }
    public function render()
    {
        return view('admin.dashboard');
    }
}
