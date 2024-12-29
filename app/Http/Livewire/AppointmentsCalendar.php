<?php

namespace App\Http\Livewire;

use App\Models\Events;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class AppointmentsCalendar extends LivewireCalendar
{
    // public function render()
    // {
    //     return view('livewire.appointments-calendar');
    // }

    // public function onDayClick($year, $month, $day)
    // {
    //     dd($day, $month, $year);
    // }

    // public function onEventClick($eventId)
    // {
    //     dd('event id', $eventId);
    // }

    // public function onEventDropped($eventId, $year, $month, $day)
    // {
    //    dd('event dropped', $eventId, $year, $month, $day, Carbon::now('Asia/Yangon'));
    // }

    public function events(): Collection
    {
        $events = Events::select('id', 'title', 'description', 'date')->get();
        return collect($events);
    }
}
