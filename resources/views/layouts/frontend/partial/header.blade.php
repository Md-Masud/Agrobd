<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="{{ asset('assets/frontend/image/logo.jpg')}}" width="125px">
            </div>
            <nav>
                <ul id="menuitem">
                    <li><a href="{{url('/')}}">Home </a></li>
                    @auth()
                        @if(Auth::user()->role->id == 1)
                            <li><a href="{{route('admin.dashboard')}}"> Admin Profile</a> </li>
                        @elseif(Auth::user()->role->id == 2)
                            <li><a href="{{route('user.dashboard')}}"> UserProfile</a> </li>
                        @endif
                    @endauth
                    <li><a href="{{route('all.product')}}">All Product</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth

                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    @auth('web')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                    <li class="btn" data-toggle="modal" data-target="#add-item-modal"><a href="#">Add Item</a></li>
                </ul>
            </nav>
            <img src="{{ asset('assets/frontend/image/menu.png')}}"class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="row">
            <div class="col-2">
                <h1>No 1 Agricultural platform<br> to sell your products</h1>
                <p>All in one online market place for agricultural products<br>you can try us.</p>
                <a href="" class="btn">Visit Now &#8594;</a>
            </div>
{{--            <div class="col-2">--}}
{{--                <img src="{{ asset('assets/frontend/image/cover.pn')}}" height="400px" width="400px">--}}
{{--            </div>--}}
        </div>
    </div>
</div>
