@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row text-white">
            <div class="col-lg-3">
                @include("layouts.partials.left-sidebar")
            </div>
            <div class="col-lg-6">
                @include("layouts.partials.navbar")
                <div class="border-custom border-left border-right">
                    <div class="border-custom border-bottom">
                        <livewire:profile-info :user="$user" :key="rand()"></livewire:profile-info>
                    </div>
                    <livewire:profile-tweet :user="$user" :key="rand()"></livewire:profile-tweet>
                </div>
            </div>
            <div class="col-lg-3 mt-3">
                @include("layouts.partials.right-sidebar")
            </div>
        </div>
    </div>
@stop
