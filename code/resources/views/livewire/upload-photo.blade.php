<div class="div-template rounded-lg border border-slate-400 dark:border-slate-200">
    <form wire:submit="save">
        <div class="grid grid-rows-3">
            <div class="flex justify-center">
                <x-input-file name="photo" label="photo" required wire:model="photo" />
            </div>
            @if($photo)
            <div class="row-span-1 ">
                <div class="flex justify-center">
                    <img src="{{$photo->temporaryUrl()}}" class="max-h-20">
                </div>
            </div>
            @endif
            <div class="text-center mt-2">
                <button class="btn-primary">Upload</button>
            </div>
        </div>
    </form>
</div>