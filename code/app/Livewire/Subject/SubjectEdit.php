<?php

namespace App\Livewire\Subject;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Subject;
class SubjectEdit extends Component
{

    public ?Subject $subject;
    #[Validate('required|min:4')]
    public $name;

    public function mount($id = null){
        if(!empty($id)){
            $this->subject =  Subject::findOrFail($id);
            $this->name = $this->subject->name;
        }
    }

    public function render()
    {
        return view('livewire.subject.edit')->title(empty($this->subject->id) ? 'Add subject':'Edit sub');
    }

    
    public function save() {
        $message = 'Subject added!';
        $this->validate();
        if(empty($this->subject->id)){
            Subject::create(['name'=>$this->name]);
        }else{
            $this->subject->name = $this->name;
            $this->subject->save();
            $message = 'Subject edited!';
        }
        return back()->with('success', $message);
    }
}
