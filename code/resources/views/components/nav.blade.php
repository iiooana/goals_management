<nav class="bg-bluew-300/30 dark:bg-bluew-900/10 px-2 text-gray-800 dark:text-slate-100 min-h-16 text-md font-bold shadow-md flex flex-row items-center uppercase tracking-tight">
    <div class="basis-1/4">
        <a href="/" class="basic-6">
            <img class="max-h-14" src="/img/icons8-goals-lineal-color-96.png">
        </a>
    </div>
    <div class="basis-3/4">
        <a href="/" wire:navigate class="btn-navbar basic-2/4">Dashboard</a>
        <a href="/task" wire:navigate class="btn-navbar basic-2/4">Add task</a>
        <a href="/tasks" wire:navigate class="btn-navbar basic-2/4">Show tasks</a>
        <a href="/subjects" wire:navigate class="btn-navbar basic-2/4">Show subjects</a>
        <a href="/start-quiz" wire:navigate class="btn-navbar basic-2/4">Start Quiz</a>
    </div>
    <div class="basis-1/2 text-right">
        <button class="py-2 px-2 min-w-10 basic-2/4 " onclick="toogleTheme()">
            <i id="icon-theme" class="fa fa-sun-o text-bluew-950 dark:text-amber-100 text-2xl"></i>
        </button>
    </div>
</nav>
