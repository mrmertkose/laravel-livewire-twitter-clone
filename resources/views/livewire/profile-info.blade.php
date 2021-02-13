<div>
    <div class="d-flex align-items-center flex-column py-4">
        <div><img class="rounded-circle img-fluid" src="{{asset("images/user/".$user->image)}}" alt="{{$user->name}}"
                  width="75"></div>
        <div class="d-flex justify-content-center mt-2">
            <span class="mr-2">{{$user->name}}</span>
            <span class="mr-2"> • </span>
            <span class="text-muted">{{$user->username}}</span>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <div class="mr-2"><span class="font-weight-bold">{{$user->following($user->id)->count()}}</span> <span
                    class="font-weight-light">takip</span></div>
            <div class="mr-2"><span class="font-weight-bold">{{$user->followers($user->id)->count()}}</span> <span
                    class="font-weight-light">takipçi</span>
            </div>
        </div>
        @if($user->id != auth()->id())
            <div class="mt-3">
                @if($user->followers($user->id)->count())
                    <button wire:click="$emit('unfollow',{{$user->id}})" class="btn btn-light btn-sm">takibi bırak
                    </button>
                @else
                    <button wire:click="$emit('follow',{{$user->id}})" class="btn btn-primary btn-sm">takip et</button>
                @endif
            </div>
        @endif
    </div>
</div>
