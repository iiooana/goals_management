<div class="div-template">
    @if($goals->count() == 0)
    <h2>It's a relax day!</h2>
    @else
    <h2 class="text-center text-2xl capitalize my-2">Task to do: {{$goals->count()}}</h2>
    <div class="grid grid-cols-3 gap-3">
        @foreach($goals as $item)
        @php
            $class = "from-bluew-600/30 to-bluew-950/40";
            if(!empty($item->completed_at)){
            $class = "from-green-600/90 to-green-950/40 ";
            }else if(!empty($item->deadline) ){
                $timestap = strtotime($item->deadline);
                if( $timestap < time()){
                    $class="from-red-600/100 to-red-950/40" ;
                }else if($timestap>= strtotime("- 1 day") ){
                    $class = "from-yellow-600/80 to-yellow-950/40";
                }
           }
         @endphp
            <div class="bg-gradient-to-r {{$class}} rounded-lg p-2 flex flex-col justify-between">
                <div class="flex flex-row justify-between items-center">
                    <div>
                        <p class="text-2xl uppercase">{{$item->title}}</p>
                        @if(!empty($item->deadline))
                        <p>Deadline: {{ date('H:i d/m/Y',strtotime($item->deadline))}}</p>
                        @endif
                    </div>
                    <div>
                        @if(empty($item->completd_at) && !empty($item->deadline))
                            @php
                            $date_deadline = new DateTimeImmutable($item->deadline." Europe/Rome");
                            $date_now = new DateTimeImmutable(date('Y-m-d H:i')." Europe/Rome");
                            $diff = $date_deadline->diff($date_now,true);
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
                    <div class="flex flex-row text-xs mt-1 gap-1">
                        <button class="border rounded-lg p-1"><i class="fa fa-trash"></i> Delete</button>
                        <button class="border rounded-lg p-1"><i class="fa fa-pencil"></i> Edit</button>
                        <button class="border rounded-lg p-1"><i class="fa fa-check"></i> Complete</button>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    @endif
</div>