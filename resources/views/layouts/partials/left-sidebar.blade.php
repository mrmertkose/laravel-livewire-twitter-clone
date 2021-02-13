<div class="mt-3 sticky-top">
    <ul class="font-weight-bolder">
        <li class="mb-3"><a href="{{route("home")}}"><i class="fab fa-twitter fa-2x"></i></a></li>
        <li class="left-sidebar mb-3"><a href="{{route("home")}}"
                                         class="{{ request()->is("home") ? "active-custom" : "" }}"><i
                    class="fas fa-home fa-size-custom mr-2"></i> <span
                    class="left-sidebar-text">Anasayfa</span></a></li>
        <li class="left-sidebar mb-3"><a href="#"><i class="fas fa-hashtag fa-size-custom mr-2"></i> <span
                    class="left-sidebar-text">Keşfet</span></a></li>
        <li class="left-sidebar mb-3"><a href="{{route("profile",auth()->user()->username)}}"
                                         class="{{ request()->is("p/".auth()->user()->username) ? "active-custom" : "" }}"><i
                    class="fas fa-user fa-size-custom mr-2"></i> <span
                    class="left-sidebar-text">Profil</span></a></li>
        <li class="left-sidebar mb-3"><a href="#"><i class="fas fa-cog fa-size-custom mr-2"></i> <span
                    class="left-sidebar-text">Ayarlar</span></a></li>
        <form method="POST" action="{{ route('logout') }}" id="formLogout">
            @csrf
            <li class="left-sidebar mb-3"><a href="javascript:void(0)"
                                             onclick="document.getElementById('formLogout').submit();"><i
                        class="fas fa-sign-out-alt fa-size-custom mr-2"></i> <span
                        class="left-sidebar-text">Çıkış</span></a></li>
        </form>
    </ul>
</div>
