<div class="mt-2">
    @if($tweets->count())
        @foreach($tweets as $item)
            <div class="p-3 border-bottom border-top border-custom"
                 wire:key="{{$item->id}}">
                <div class="row">
                    <div class="col-lg-2 d-flex align-items-center">
                        <a href="{{route("profile",$item->user->username)}}">
                        <img class="rounded-circle img-fluid" src="{{asset("images/user/".$item->user->image)}}" alt="{{$item->user->name}}"
                             width="75">
                        </a>
                    </div>
                    <div class="col-lg-10 pb-2">
                        <span class="font-weight-bold"><a href="{{route("profile",$item->user->username)}}"> {{$item->user->name}}</a></span>
                        <span class="text-muted"><a href="{{route("profile",$item->user->username)}}">• {{$item->user->username}}</a> </span>
                        <span class="text-muted">• {{$item->created_at->diffForHumans(null,true, true)}}</span>
                        <span class="d-flex justify-content-center flex-column">
                        <span class="mb-2">{!! hashtag($item->post) !!}</span>
                            @if($item->image)
                                <img class="image-timeline" src="{{asset("/storage/images/tweet/".$item->image)}}">
                            @endif
                </span>
                    </div>
                    <div class="offset-2 col-lg-10 d-flex justify-content-start">
                        <span class="mr-4"><a href="#"><i class="fas fa-comment get-tweet-icon"></i> </a> </span>
                        @if($item->favorite()->data->count())
                            <span><a wire:click.prevent="unFavorites({{$item->id}})"><i
                                        class="fas fa-heart get-tweet-icon is-liked"></i></a> @if($item->favorite()->counter > 0)
                                    <small class="text-muted">{{$item->favorite()->counter}}</small>@endif</span>
                        @else
                            <span><a wire:click.prevent="favorites({{$item->id}})"><i
                                        class="fas fa-heart get-tweet-icon"></i></a> @if($item->favorite()->counter > 0)
                                    <small class="text-muted">{{$item->favorite()->counter}}</small>@endif</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        twit yok
    @endif
</div>
