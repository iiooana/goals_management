<div class="div-template dark:dark:border-slate-200">
    <div class="">
        <x-input-search name="search" wire:model.live="query" />
    </div>
    <table class="table-auto w-full border dark:border-slate-200 rounded-lg ">
        <thead>
            <tr class="bg-bluew-300/60 ">
                <th class="border  border-slate-600 dark:border-slate-200 font-medium p-2 text-left uppercase max-w-3">Title</th>
                <th class="border  border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Description</th>
                <th class="border  border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Deadline</th>
                <th class="border  border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Created at</th>
                <th class="border  border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Status</th>
                <th class="border border-slate-600  dark:border-slate-200 font-medium p-2 text-left uppercase">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($goals as $item)
            <tr :key="goal_{{$item->id}}">
                <td class="uppercase border border-slate-600  dark:border-slate-200 p-2 text-left ">{{$item->title}}</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">{{$item->description}}</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">@if(!empty($item->deadline)) {{ date('H:i d/m/Y',strtotime($item->deadline)) }} @endif</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">@if(!empty($item->created_at)) {{ date('H:i d/m/Y',strtotime($item->created_at)) }} @endif</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">@if(!empty($item->completed_at)) <i class="fa fa-check text-green-400"></i> @endif</td>
                <td class="border border-slate-600  dark:border-slate-200 p-2 text-left">
                    <a href="/task/{{$item->id}}" wire:navigate class="text-xs border border-black dark:border-white rounded-lg p-1 hover:font-extrabold"><i class="fa fa-pencil"></i> Edit</a>
                </td>
            </tr>
            @endforeach
         
        </tbody>
    </table>
    {{$goals->links()}}
</div>