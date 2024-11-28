@props(['extra_classes'])
<div class="flex justify-center {{ $extra_classes }} my-3 py-2 px-1 text-center font-semibold leading-6 text-sm shadow-inner rounded-lg dark:text-slate-950 
        transition-opacity-0 duration-150">
    <p>{{ $slot}}</p>
</div>