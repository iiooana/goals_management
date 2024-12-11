<?php
 
use Livewire\Volt\Component;
use Livewire\Attribute\{Title};

new
#[Title('count')]
class extends Component {
    public $count = 0;
    
    public  function increment()
    {
        $this->count++;
    }
}
 
?>
 
 <div class="div-template rounded-lg border border-slate-400 dark:border-slate-200">
    <h1>{{ $count }}</h1>
    <button wire:click="increment" class="btn-primary">+</button>
</div>