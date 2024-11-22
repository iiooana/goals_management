@props(['name','label','required'])
<div class="grid grid-cols-3 gap-1">
    <label class="form-label">@if(isset($label)){{ $label}} @else {{$name}} @endif @if(isset($required)) <span class="text-red-500">*</span> @endif</label>
    <textarea name="" name="{{$name}}" {{$attributes}} rows="5" class="w-full py-1 px-2 dark:text-slate-800 min-h-8 rounded-lg col-span-2 bg-bluew-200" @if(isset($label)) title="{{ $label}}" @endif></textarea>
    @error($name)
        <p class="form-error">{{$message}}</p>
    @enderror
</div>
  
  
