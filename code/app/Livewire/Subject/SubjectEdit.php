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
        return view('livewire.subject.edit')->title((empty($this->subject->id) ? 'Add':'Edit').' subject');
    }
    
    public function save() {
        $this->validate();
        $name = $this->pull('name');
        $message = $name.' added!';
        if(empty($this->subject->id)){
            Subject::create(['name'=>$name]);
        }else{
            $this->subject->name = $name;
            $this->subject->save();
            $message = $name.' edited!';
        }
        $this->dispatch('subject-edit');
        return back()->with('success', $message);
    }
}
