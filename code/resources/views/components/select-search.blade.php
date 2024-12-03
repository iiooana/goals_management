<div>
    <input type="text" class="w-full py-0.5 px-2 dark:text-slate-800 rounded-lg col-span-2 bg-bluew-200" @input.debounce="selectSearch(this,'/search/'+this.val,'select_2')">
    <select class="hidden w-full mt-2 py-0.5 px-2 dark:text-slate-800 rounded-lg col-span-2 bg-bluew-200" id="select_2">
        <option value="opt1"></option>
    </select>
</div>