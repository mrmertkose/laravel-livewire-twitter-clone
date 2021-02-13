<div>
    <form wire:submit.prevent="submit">
        <div class="row p-3">
            <div class="col-lg-3">
                <img class="rounded-circle img-fluid mx-4 my-3" src="{{asset("images/user/".auth()->user()->image)}}"
                     alt="{{auth()->user()->name}}" width="75">
            </div>
            <div class="col-lg-9">
                @error('post')
                <div class="invalid-feedback">{{ $message }}</div> @enderror
                <textarea wire:model="post" class="form-control text-area mt-3 @error('post') is-invalid @enderror"
                          placeholder="Neler Oluyor ?"></textarea>
                @error('post')
                <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="offset-3 col-lg-9">
                <span>
                    <label for="specialFile">
                        <i class="fas fa-image text-area-icon mr-2 image-upload"></i>
                    </label>
                    <input type="file" id="specialFile" class="specialFile" wire:model="image">
                </span>
                <span><a class="text-area-icon" href="javascript:;"> <i
                            class="fas fa-smile text-area-icon"></i> </a></span>
                <span><button wire:click.prevent="store()"
                              class="btn btn-primary btn-sm float-right" {{empty($post) || count($errors) > 0 ? 'disabled' : ''}}>Tweetle</button></span>
            </div>
        </div>
    </form>
</div>
