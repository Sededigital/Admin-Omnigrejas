<?php

namespace App\Livewire\Church\Only;

use App\Models\Igreja;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Models\IgrejaMembro;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

#[Title('A Igreja')]
#[Layout('components.layouts.app')]
class OnlyChurches extends Component
{
    use WithPagination, WithFileUploads;

    public function render()
    {
        return view('church.only.only-churches');
    }
}

