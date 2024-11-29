@props(['name','label','required'])
<div class="flex justify-end my-1">
    <input placeholder="@if(isset($label)){{ $label}} @else {{$name}} @endif ..." type="search" name="{{$name}}" {{$attributes}} class="py-0.5 px-2 dark:text-slate-800 rounded-lg bg-bluew-200" @if(isset($label)) title="{{ $label}}" @endif >
</div>
  