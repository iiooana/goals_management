<?php

namespace App\Livewire\Goal;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Goal;
use Livewire\WithPagination;

#[Title('Show Tasks')]  
class ShowGoals extends Component
{
    use WithPagination;
    public $query = '';

    public function search(){
       $this->resetPAge();
    }

    public function renderDemo(){
        return view('livewire.goal.show-goals',[
            'goals' => Goal::whereIn('id',[15,26,12,30,66,16,13,111,177,182,198])
            ->where(function($query){
                $query->orWhere('title','ilike','%'.$this->query.'%');
                $query->orWhere('description','ilike','%'.$this->query.'%');
            })->orderBy('title','asc')->paginate(15)
        ]); 
    }
    
    public function render()
    {
        return view('livewire.goal.show-goals',[
            'goals' => Goal::where('title','ilike','%'.$this->query.'%')->orWhere('description','ilike','%'.$this->query.'%')->orderBy('title','asc')->paginate(15)
        ]); 
    }
}
