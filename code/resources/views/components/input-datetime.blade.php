@props(['name','label','required'])
<div class="grid grid-cols-3 gap-1">
    <label class="form-label">@if(isset($label)){{ $label}} @else {{$name}} @endif @if(isset($required)) <span class="text-red-500">*</span> @endif</label>
    <div>
        <input type="datetime-local" name="{{$name}}" {{$attributes}} class="w-full py-1 px-2 dark:text-slate-800 min-h-8 rounded-lg col-span-2 bg-bluew-200" @if(isset($label)) title="{{ $label}}" @endif>
        <button type="button" class="underline text-xs text-right w-full" x-on:click="$wire.set('{{$name}}','',false)">reset</button>
    </div>
    @error($name)
        <p class="form-error normal-case">{{$message}}</p>
    @enderror 
</div>
  
  
