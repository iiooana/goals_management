<div class="div-template rounded-lg border border-slate-400 dark:border-slate-200">
    <form wire:submit="save">
        <div class="grid grid-cols-2 gap-3">
            <x-input-text name="form.title" label="title" required="true" wire:model="form.title" />
            <x-input-datetime name="form.deadline" label="deadline" min="{{ $is_new === true? date('Y-m-d').'T'.date('H:i') : ''}}" wire:model="form.deadline" />        
            <x-input-textarea name="form.description" label="description" wire:model="form.description" />
        </div>
        <div wire:loading.delay>
            <div class="flex justify-center bg-amber-500 my-3 py-2 px-1 text-center font-semibold leading-6 text-sm shadow-inner rounded-lg dark:text-slate-950 transition ease-in-out duration-150">
               <x-spinner/>
                <span>Processing...</span>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn-primary">
                Save
            </button>
        </div>
        @if(!empty(session('success')))
        <div class="flex justify-center bg-green-500 my-3 py-2 px-1 text-center font-semibold leading-6 text-sm shadow-inner rounded-lg dark:text-slate-950 transition ease-in-out duration-150">
                <span>{{session('success')}}</span>
            </div>
        @endif
    </form>
</div>