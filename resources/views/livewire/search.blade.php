<div>
    <div class="form-group has-search position-relative">
        <span class="fa fa-search form-control-feedback"></span>
        <input type="text" class="form-control search-form-round text-white"
               placeholder="Twitter'da Ara"
               wire:model="query"
               wire:keydown.escape="resetValues"
               wire:keydown.tab="resetValues"
        />

        @if(!empty($query))
            <div class="list-group text-white scroll-search">
                @if(count($users) > 0)
                    @foreach($users as $item)
                        <a href="#" class="list-group-item search-item-color">{{$item->name }}</a>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
</div>
