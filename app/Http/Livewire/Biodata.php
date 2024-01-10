<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Biodata as ModelsBiodata;
use Illuminate\Support\Facades\Auth;

class Biodata extends Component
{
    public $dataBiodata;


    // message
    public $message = '';
    public function __construct()
    {
        parent::__construct();
    }
    public function updating()
    {
        $this->dataBiodata;
    }
    public function updated()
    {
        $this->dataBiodata;
    }
    public function render()
    {
        $this->dataBiodata;
        return view('livewire.biodata');
    }
}
