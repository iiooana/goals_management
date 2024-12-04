<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Count down')]  
class CountDown extends Component
{
    public $start = 10;

    public function begin(){
        while($this->start >=0){
            $this->stream(
                to: 'count',
                content: $this->start,
                replace: true
            );
            sleep(1);
            $this->start--;
        }
    }

    public function render()
    {
        return view('livewire.count-down');
    }
}
