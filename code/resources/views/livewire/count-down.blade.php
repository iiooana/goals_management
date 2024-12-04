<div class="div-template rounded-lg border border-slate-400 dark:border-slate-200">
    <button wire:click="begin" type="button" class="btn-primary">Start count-down</button>
    <h1>Count <span wire:stream="count">{{$start}}</span></h1>
</div>
