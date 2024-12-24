<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;

class Editor extends Component
{
    public $value;
    
    public function render()
    {
        return view('livewire.editor.editor')
                ->layout('layouts.app');
    }
}
