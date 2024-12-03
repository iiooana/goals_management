<div class="div-template rounded-lg border border-slate-400 dark:border-slate-200">
    <form wire:submit="step1">
        <div class="grid grid-cols-2 gap-6">
            <x-input-number name="n_questions" label="N. of questions" required="true" wire:model="n_questions" min="1" step="1" />
            <x-select name="subject_id" wire:model="subject_id" label="Subject" required="true">
                <x-slot:options>
                    <option value="">Select a subject</option>
                    @if(!empty($subject_options))
                    @foreach($subject_options as $item)
                    <option value="{{$item['id'] }}">{{$item['name']}}</option>
                    @endforeach
                    @endif
                    </x-slot>
            </x-select>
        </div>
        <div class="flex justify-center mt-2">
            <button class="btn-primary">Save</button>
        </div>
    </form>
</div>