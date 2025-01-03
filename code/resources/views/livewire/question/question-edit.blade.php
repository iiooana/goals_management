<div class="div-template rounded-lg border border-slate-400 dark:border-slate-200">
    <form wire:submit="save"  >
        <x-input-textarea name="question_text" label="question text" wire:model="question_text" required="true" wire:keydown.enter="save" />
        <div wire:loading.delay>
            <div class="flex justify-center bg-amber-500 my-3 py-2 px-1 text-center font-semibold leading-6 text-sm shadow-inner rounded-lg dark:text-slate-950 transition ease-in-out duration-150">
               <x-spinner/>
                <span>Processing...</span>
            </div>
        </div>
        <div class="text-center mt-4">
            <button class="btn-primary">
                @if(empty($question->id))
                    Add new
                @else
                    Save
                @endif
            </button>
        </div>
        @if(!empty(session('success')))
        <div class="flex justify-center bg-green-500 my-3 py-2 px-1 text-center font-semibold leading-6 text-sm shadow-inner rounded-lg dark:text-slate-950 transition ease-in-out duration-150">
                <span>{{session('success')}}</span>
            </div>
        @endif
    </form>
</div>
