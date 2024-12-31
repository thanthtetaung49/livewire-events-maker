<?php

namespace App\Http\Livewire\OrganizationChart;

use Livewire\Component;

class Chart extends Component
{
    public function render()
    {
        return view('livewire.organization-chart.chart')
                ->layout('layouts.app');
    }
}
