<div>
    <ul class="events p-2">
        <li class="events-h pb-2 text-center">gündemler</li>
        @foreach($hashtags as $item)
        <li class="border-top border-custom py-1 font-weight-bold">
            <a href="#">
                <span class="h-100 d-flex justify-content-center flex-column ml-2">{{$item->name}}</span>
                <span class="h-100 d-flex justify-content-center flex-column text-muted ml-2"><small>{{$item->count}} tweet</small></span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
