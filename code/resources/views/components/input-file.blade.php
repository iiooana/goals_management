@props(['name','label','required'])
<div class="grid grid-cols-3 gap-1">
    <label class="form-label">@if(isset($label)){{ $label}} @else {{$name}} @endif @if(isset($required)) <span class="text-red-500">*</span> @endif</label>
    <input type="file" name="{{$name}}" {{$attributes}} class="w-full py-0.5 px-2 dark:file:text-slate-800 file:border-none file:me-4 file:font-medium file:px-4 file:hover:bg-bluew-400  dark:file:hover:bg-blue-300 file:hover:shadow-inner file:rounded-lg file:bg-bluew-400/60 dark:file:bg-bluew-200" @if(isset($label)) title="{{ $label}}" @endif >
    
    <div wire:loading wire:target="{{$name}}">Uploading...</div>
    @error($name)
        <p class="form-error normal-case">{{$message}}</p>
    @enderror
</div>
  
  