<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Datadiri extends Component
{
    public $name;
    public $nav = 'biodata';
    public $allData;



    public function handleNav($selectedNav)
    {
        return $this->nav = $selectedNav;
    }

    public function mounted()
    {
        $this->emit('scriptExecuted');
    }

    public function render()
    {
        $this->dispatchBrowserEvent('jquery');
        return view('livewire.datadiri');
    }
}
