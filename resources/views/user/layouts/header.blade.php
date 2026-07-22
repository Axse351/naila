<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('welcome') }}" class="logo">
                        <img src="{{ asset('assets_user/images/logo.jpg') }}" style="height:50px; width:auto;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section">
                            <a href="{{ route('welcome') }}#men" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">
                                Profil
                            </a>
                        </li>
                        <li class="scroll-to-section"><a href="{{ route('welcome') }}#child">Promo</a></li>
                        <li class="scroll-to-section"><a href="{{ route('welcome') }}#women">Info</a></li>
                        <li>
                            <a href="{{ route('katalog') }}" class="{{ request()->routeIs('katalog') ? 'active' : '' }}">
                                Katalog
                            </a>
                        </li>

                        @auth
                            <li>
                                <a href="{{ route('pesanan.index') }}" class="{{ request()->routeIs('pesanan.*') ? 'active' : '' }}">
                                    Pesanan Saya
                                </a>
                            </li>

                            @if (auth()->user()->isAdmin())
                                <li><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                            @endif

                            <li class="user-info">
                                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                                    <i class="fa fa-user"></i>
                                    <span>{{ auth()->user()->name }}</span>
                                </a>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                    @csrf
                                    <button type="submit" class="btn-logout">Keluar</button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
                                    Masuk
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'active' : '' }}">
                                    Daftar
                                </a>
                            </li>
                        @endauth
                    </ul>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
