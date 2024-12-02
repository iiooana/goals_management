<div class="div-template dark:dark:border-slate-200">

    <livewire:subject.subjectedit />
    <div class="mt-10">
        <x-input-search name="search" wire:model.live="query" />
    </div>
    <table class="table-auto w-full border dark:border-slate-200 rounded-lg ">
        <thead>
            <tr class="bg-bluew-300/60 ">
                <th class="border  border-slate-600 dark:border-slate-200 font-medium p-2 text-left uppercase max-w-3">Name</th>
                <th class="border  border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Created at</th>
                <th class="border border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $item)
            <tr :key="subject_{{$item->id}}">
                <td class="uppercase border border-slate-600  dark:border-slate-200 p-2 text-left ">{{$item->name}}</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">@if(!empty($item->created_at)) {{ date('H:i d/m/Y',strtotime($item->created_at)) }} @endif</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">
                    <button type="button" wire:click="delete({{$item->id}})"  wire:confirm="Are you sure to delete {{$item->name}}?" class="text-xs border border-black dark:border-white rounded-lg p-1 hover:font-extrabold"><i class="fa fa-trash"></i> delete</button>
                    <a href="/subject/{{$item->id}}" wire:navigate class="text-xs border border-black dark:border-white rounded-lg p-1 hover:font-extrabold"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="/subject/{{$item->id}}/add-question" wire:navigate class="text-xs border border-black dark:border-white rounded-lg p-1 hover:font-extrabold"><i class="fa fa-question"></i> Add question</a>
                </td>
            </tr>
            @endforeach
         
        </tbody>
    </table>
    {{$subjects->links()}}
</div>