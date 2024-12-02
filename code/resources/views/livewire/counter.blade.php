<?php

use function Livewire\Volt\{layout,state};

layout('components.layouts.app');
state(['count'=>0 ,'toggle' => false]);

$increment = fn() => $this->count++;
 
$toggleModal = function () {
    $this->toggle = !$this->toggle;
    Log::info('Toggle Modal Triggered', ['toggle' => $this->toggle]);
};
?>

<div class="text-white">
    <h1>{{$count}}</h1>
    <button class="bg-bluew-400 rounded-lg p-1" wire:click="increment">++</button>
   
    <div class="flex flex-1 flex-row">
            <div class="self-start">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="ml-auto" wire:click="toggleModal">
                <button id="create-post" >Create Post</button>
            </div>
    </div>
    

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   saasas
                </div>
            </div>
        </div>
</div>
