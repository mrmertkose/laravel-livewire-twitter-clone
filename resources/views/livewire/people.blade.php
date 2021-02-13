<div>
    <ul class="events p-2">
        <li class="events-h pb-2 text-center">takip et</li>
        @foreach($users as $item)
        <li class="border-top border-custom py-1 font-weight-bold mt-1" wire:key="{{$item->id}}">
            <div class="d-flex justify-content-between">
            <span><a href="{{route("profile",$item->username)}}"> <img class="rounded-circle img-fluid"
                       src="{{asset("images/user/".$item->image)}}"
                       width="50" alt="{{$item->name}}"></a></span>
                <div class="d-flex align-items-center flex-column font-weight-light rand-people my-auto">

                    <span><a href="{{route("profile",$item->username)}}">{{Illuminate\Support\Str::limit($item->name,10)}}</a></span>
                    <span class="text-muted"><a href="{{route("profile",$item->username)}}">{{Illuminate\Support\Str::limit($item->username,10)}}</a></span>

                </div>
                <span class="d-flex align-items-center">
                    @if($item->followers($item->id)->count())
                        <button wire:click="unfollow({{$item->id}})" class="btn btn-light btn-sm">takibi bırak</button>
                    @else
                        <button wire:click="follow({{$item->id}})" class="btn btn-primary btn-sm">takip et</button>
                    @endif
                </span>
            </div>
        </li>
        @endforeach
    </ul>

</div>
