<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Goal;

#[Title('Dashboard')]
class Home extends Component
{
    public $goals;
    public $count_todo;
    public function mount(){
        $this->goals = Goal::orderBy('deadline','asc')->orderBy('id','asc')->get();
        $this->count_todo =  Goal::whereNull("completed_at")->count();
    }
    public function render()
    {
        return view('livewire.home');
    }
    public function complete($id){
        Goal::where('id',$id)->update(['completed_at'=> date('Y-m-d H:i:s')]);
    }
    public function delete($id){
        Goal::where('id',$id)->delete();
        $this->mount();
    }
}
