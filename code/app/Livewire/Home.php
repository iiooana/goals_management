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
        $this->goals = $this->goals->merge(Goal::whereNotNull("completed_at")->orderBy('created_at','desc')->orderBy('title','asc')->orderBy('id','asc')->get());
        $this->count_todo =  Goal::whereNull("completed_at")->count();

        $this->tot =  Goal::count();
        $this->success =  Goal::whereNotNull("completed_at")->count();
    }
    public function mountDemo(){
        $tmp = [15,26,12,30,66,16,13,111,177,182,198];
        $this->goals = Goal::whereIn('id',$tmp)->whereNull("completed_at")->orderBy('deadline','asc')->orderBy('title','asc')->orderBy('id','asc')->get();
        $this->goals = $this->goals->merge(Goal::whereIn('id',$tmp)->whereNotNull("completed_at")->orderBy('created_at','desc')->orderBy('title','asc')->orderBy('id','asc')->get());
        $this->count_todo =  Goal::whereIn('id',$tmp)->whereNull("completed_at")->count();

        $this->tot =  Goal::whereIn('id',$tmp)->count();
        $this->success =  Goal::whereIn('id',$tmp)->whereNotNull("completed_at")->count();
    }
    public function render()
    {
        return view('livewire.home');
    }
    public function complete($id){
        Goal::where('id',$id)->update(['completed_at'=> date('Y-m-d H:i:s')]);
        $this->mount();
    }
    public function uncomplete($id){
        Goal::where('id',$id)->update(['completed_at'=> null]);
        $this->mount();
    }
    public function delete($id){
        Goal::where('id',$id)->delete();
        $this->mount();
    }
    public function clone($id){
        $goal = Goal::findOrFail($id);
        $new_goal = new Goal();
        $new_goal->title = $goal->title;
        $new_goal->deadline = $goal->deadline;
        $new_goal->description = $goal->description;
        $new_goal->save();
        return redirect('/task/'.$new_goal->id);
    }
}
