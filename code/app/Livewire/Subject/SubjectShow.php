<?php

namespace App\Livewire\Subject;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Subject;


#[Title('Show Subjects')]  
class SubjectShow extends Component
{
    use WithPagination;

    public $query = '';

    public function search(){
        $this->resetPAge();
    }

    public function render()
    {
        return view('livewire.subject.show',[
            'subjects' => Subject::where('name','ilike', '%'.$this->query.'%')->orderBy('name','asc')->paginate(15),
        ]);
    }
}
