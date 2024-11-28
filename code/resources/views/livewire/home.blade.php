<div class="div-template">
    @if( $count_todo == 0)
    <h2 class="text-center text-2xl capitalize my-1">It's a relax day!</h2>
    @else
    <h2 class="text-center text-2xl capitalize my-1">Task to do: {{ $count_todo }}</h2>
    <!-- region progress bar -->
    <div class="flex flex-row justify-center my-2">
        @php
        $percent = round(($success*100)/$tot,2);
        $to_color = "transparent";
        if($percent == 100){ ;
         $to_color = "rgb(22,163,74)";
        }
        @endphp
       <div class="w-6/12 rounded-2xl bg-gradient-to-r border border-slate-700 dark:border-slate-400 to-green-950/50 py-0.5 px-1 text-center inline"
       style="background: linear-gradient(to right, rgb(22,163,74,0.9) 0% , {{$to_color}} {{intval($percent)}}%)">
            <span>{{$percent}}%</span>
        </div>
    </div> 
    <!-- endregion progress bar-->    
    @if(!empty(session('success')))
        <x-alert extra_classes="bg-green-500">{{session('success')}}</x-alert>
    @endif
    <div class="grid lg:grid-cols-3 xl:grid-cols-4 gap-3">
        @foreach($goals as $item)
        @php
            $class = "from-bluew-400/90 to-bluew-700 dark:f6om-bluew-600/30 dark:to-bluew-950/40";
            if(!empty($item->completed_at)){
            $class = "from-green-400/90 to-green-700 dark:from-green-600/90 dark:to-green-950/40 ";
            }else if(!empty($item->deadline) ){
                $timestap = strtotime($item->deadline);
                if( $timestap < time()){
                    $class="from-red-400/90 to-red-700 dark:from-red-600/100 dark:to-red-950/40" ;
                }else if($timestap <= strtotime("+1 day") ){
                    $class = "from-yellow-400/90 to-yellow-700 dark:from-yellow-600/80 dark:to-yellow-950/40";
                }
                else if($timestap <= strtotime("+7 day") ){
                    $class = "from-orange-600/80 to-orange-800 dark:from-orange-600/80 dark:to-orange-950/40";
                }
           }
         @endphp
            <div wire:key="{{$item->id}}" class="bg-gradient-to-r {{$class}} rounded-lg p-2 flex flex-col justify-between">
                <div class="flex flex-row justify-between items-center">
                    <div>
                        <p class="text-2xl uppercase">{{$item->title}}</p>
                        @if(!empty($item->deadline))
                            <p><i class="fa fa-calendar-check-o"></i> Deadline: {{ date('H:i d/m/Y',strtotime($item->deadline))}}</p>
                        @endif
                    </div>
                    <div>
                        @if(empty($item->completed_at) && !empty($item->deadline) && strtotime($item->deadline) >= time())
                            @php
                            $date_deadline = new DateTimeImmutable($item->deadline." Europe/Rome");
                            $date_now = new DateTimeImmutable(date('Y-m-d H:i')." Europe/Rome");
                            $diff = $date_deadline->diff($date_now);
                            @endphp
                            @if(!empty($diff))
                            <ul class="text-sm">
                                @if(!empty($diff->m))
                                    <li>-{{$diff->m}} months</li>
                                @endif
                                @if(!empty($diff->d))
                                    <li>-{{$diff->d}} days</li>
                                @endif
                                @if(!empty($diff->h))
                                    <li>-{{$diff->h}} hours</li>
                                @endif
                                @if(!empty($diff->i))
                                    <li>-{{$diff->i}} minutes</li>
                                @endif
                                
                            </ul>                            
                        @endif
                        @endif
                    </div>
                </div>
                <div>
                    <p>{{$item->description}}</p>
                    <div class="flex flex-row text-xs mt-1 gap-1 ">
                        <button class="border border-black dark:border-white rounded-lg p-1 hover:font-extrabold" wire:click="delete({{$item->id}})" 
                        wire:confirm="Are you sure to delete {{ stripcslashes($item->title)}} ?"><i class="fa fa-trash"></i> Delete</button>
                        @if(empty($item->completed_at))
                        <button class="border border-black dark:border-white rounded-lg p-1 hover:font-extrabold" wire:click="clone({{$item->id}})"><i class="fa fa-check"></i> Clone</button>
                        <button class="border border-black dark:border-white rounded-lg p-1 hover:font-extrabold" wire:click="complete({{$item->id}})"><i class="fa fa-check"></i> Complete</button>
                        @else
                        <button class="border border-black dark:border-white rounded-lg p-1 hover:font-extrabold" wire:click="uncomplete({{$item->id}})"><i class="fa fa-list"></i> Uncomplete</button>
                        @endif
                        <a href="/goal/{{$item->id}}" class="border border-black dark:border-white rounded-lg p-1 hover:font-extrabold"><i class="fa fa-pencil"></i> Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    @endif
</div>