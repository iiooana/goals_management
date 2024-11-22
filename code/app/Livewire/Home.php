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
    public $tot;
    public $success;

    public function mount(){
        $this->goals = Goal::whereNull("completed_at")->orderBy('deadline','asc')->orderBy('title','asc')->orderBy('id','asc')->get();
        $this->goals = $this->goals->merge(Goal::whereNotNull("completed_at")->orderBy('deadline','asc')->orderBy('title','asc')->orderBy('id','asc')->get());
        $this->count_todo =  Goal::whereNull("completed_at")->count();
        
        $this->tot =  Goal::count();
        $this->success =  Goal::whereNotNull("completed_at")->count();
    }
    public function render()
    {
        return view('livewire.home');
    }
    public function complete($id){
        Goal::where('id',$id)->update(['completed_at'=> date('Y-m-d H:i:s')]);
        $this->mount();
    }
    public function delete($id){
        Goal::where('id',$id)->delete();
        $this->mount();
    }
}
