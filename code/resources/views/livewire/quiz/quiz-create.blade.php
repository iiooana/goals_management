<div class="div-template rounded-lg border border-slate-400 dark:border-slate-200">
    @if($step==1)
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
    @else
    <h2 class="text-center font-medium">Quiz score {{$score}}</h2>
    <div class="p-1 mx-2">
        @if(!empty($questions))
        <form wire:submit="saveScore">
            <ol class="list-decimal list-outside">
                @foreach($questions as $key => $item)
                <li wire:key="question_{{$item['id_row']}}" class="my-1">
                    <div class="grid grid-cols-2">
                        <div>
                            <span class="capitalize">{{$item['text']}}</span>
                        </div>
                        <div>
                            <input type="number" wire:model='questions.{{$key}}.score' value="{{$item['score']}}" min="0" max="1" step="0.5" class=" py-0.5 px-2 dark:text-slate-800 rounded-lg col-span-2 bg-bluew-200"">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ol>
                 <div class=" flex justify-center mt-2">
                    <button type="button" wire:confirm="Are you sure to close the quiz?" class="bg-red-400 py-1 px-3 mx-1 min-w-24 rounded-lg font-bold dark:text-black hover:bg-red-600" wire:click="terminateQuiz">Termiante quiz</button>
                        <button class="btn-primary">Save</button>
                </div>
        </form>
        @endif
    </div>
    @endif


</div>