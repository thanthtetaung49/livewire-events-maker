<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class Calendar extends Component
{
    public $title;
    public $description;
    public $date;

    public function eventEmit()
    {
        $this->emit('eventEmit', 'Data from livewire');
    }

    public function createEvent($data)
    {
        Events::create($data);
        return redirect()->to('/calendar');
    }

    public function deleteEvent($eventId) {
        Events::findOrFail($eventId)->delete();
        return redirect()->to('/calendar');
    }

    public function render()
    {
        return view('livewire.calendar.calendar')->layout('layouts.app');
    }
}
