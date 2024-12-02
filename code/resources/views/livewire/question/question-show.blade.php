<div class="div-template dark:dark:border-slate-200">
    <livewire:question.question-edit :subject_id="$subject->id" :question_id="$question_id" />
    <div class="mt-10">
        <x-input-search name="search" wire:model.live="query" />
    </div>
    <table class="table-auto w-full border dark:border-slate-200 rounded-lg ">
        <thead>
            <tr class="bg-bluew-300/60 ">
                <th class="border  border-slate-600 dark:border-slate-200 font-medium p-2 text-left uppercase">ID</th>
                <th class="border  border-slate-600 dark:border-slate-200 font-medium p-2 text-left uppercase">Text</th>
                <th class="border  border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Created at</th>
                <th class="border border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($questions))
            @foreach($questions as $item)
            <tr :key="subject_{{$item->id}}">
                <td class="uppercase border border-slate-600  dark:border-slate-200 p-2 text-left ">{{$item->id}}</td>
                <td class="uppercase border border-slate-600  dark:border-slate-200 p-2 text-left ">{{$item->text}}</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">@if(!empty($item->created_at)) {{ date('H:i d/m/Y',strtotime($item->created_at)) }} @endif</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">
                    <button type="button" wire:click="delete({{$item->id}})" wire:confirm="Are you sure to delete the question id = {{$item->id}} ?" class="text-xs border border-black dark:border-white rounded-lg p-1 hover:font-extrabold"><i class="fa fa-trash"></i> delete</button>
                    <a wire:navigate href="/subject/{{$subject->id}}/questions/{{$item->id}}" class="text-xs border border-black dark:border-white rounded-lg p-1" ><i class="fa fa-pencil"></i> Edit</button>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    @if(!empty($questions))
        {{$questions->links()}}
    @endif
</div>