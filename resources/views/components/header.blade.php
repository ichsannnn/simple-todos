<header class="mb-5">
    <div class="header-top" style="background-color: #435ebe;">
        <div class="container">
            <div class="logo">
                <a href="{{ route('home') }}"><h2 class="text-white m-0">{{ env('APP_NAME') }}</h2></a>
            </div>
            <div class="header-top-right">

                @auth
                    <div class="dropdown">
                        <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar avatar-md2" >
                                <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
                            </div>
                            <div class="text">
                                <h6 class="user-dropdown-name text-white">{{ auth()->user()->name }}</h6>
                                <p class="user-dropdown-status text-sm text-gray-400">{{ auth()->user()->username }}</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                            <li><a class="dropdown-item" href="{{ route('friends') }}">Friends</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="d-flex align-items-center dropend">
                        <div class="text">
                            <h6 class="user-dropdown-name">Login</h6>
                        </div>
                    </a>
                @endauth

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
</header>
