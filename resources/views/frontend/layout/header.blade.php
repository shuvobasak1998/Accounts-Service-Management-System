  <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="{{ asset('frontend/images/logo.png') }}" alt="Softy Pinko" />
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li>
                                <a href="{{ route('landingPage') }}"  class="{{ Route::is('landingPage') ? 'active' : '' }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('aboutPage') }}" class="{{ Route::is('aboutPage') ? 'active' : '' }}">About</a>
                            </li>
                            <li>
                                <a href="#blog" class="{{ Route::is('blogPage') ? 'active' : '' }}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('contactPage') }}" class="{{ Route::is('contactPage') ? 'active' : '' }}">Contact Us</a>
                            </li>
                        </ul>

                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
