<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.html">
            <span>Giftos</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.html">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="why.html">Why Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testimonial.html">Testimonial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
            </ul>
            <div class="user_option d-flex align-items-center">
                @if (Route::has('login'))
                    @auth
                       <a href="{{url('mycart')}}" style="margin-right: 25px; display: inline-flex; align-items: flex-start;">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <span style="color:green; margin-left: -1px; margin-top: -10px;">[{{$count}}]</span>
                        </a>

                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn nav-link" style="background: none; border: none; color: inherit; padding: 0; margin-right: 15px;">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ url('/login') }}" class="nav-link" style="margin-right: 15px;">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Login</span>
                        </a>
                        <a href="{{ url('/register') }}" class="nav-link">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>Register</span>
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
