<header class="main-header sticky-header header-with-top" id="main-header-2">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="/">
                <img src="{{ asset('assets/img/logos/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" id="drawer" type="button">
                <span class="fa fa-bars"></span>
            </button>
            <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Properties
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item " href="{{ route('propertyList',['type'=>'Rent']) }}">Rent</a>
                            </li>
                            <li class="dropdown-submenu"><a class="dropdown-item " href="{{ route('propertyList',['type'=>'Buy']) }}">Buy</a>
                            </li>
                           
                           
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route("agents") }}" id="navbarDropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Agents
                        </a>
                        
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{route('blog')}}" id="navbarDropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                    <a href="{{ route('about') }}" class="nav-link submit-property btn-5"> Who we are?</a>
                    </li>

                  
                    <li class="nav-item">
                       @if(Auth::check())
                       <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();" class="nav-link submit-property btn-5"> Logout</a>
                       <form id="logout-form"  action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                       @else
                       <a href="{{ route('login') }}" class="nav-link submit-property btn-5"> Login</a>
                       
                       @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->

<!-- Sidenav start -->
<nav id="sidebar" class="nav-sidebar">
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <a href="/">
                <img src="{{ asset('assets/img/logos/logo.png') }}" alt="sidebarlogo">
            </a>
        </div>
        <div class="sidebar-navigation">
            <h3 class="heading">Pages</h3>
            <ul class="menu-list">
                <li><a href="#" class="active pt0">Index <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li><a href="/">Index 1</a></li>
                        <li><a href="index-2.html">Index 2</a></li>
                        <li><a href="index-3.html">Index 3</a></li>
                        <li><a href="index-4.html">Index 4</a></li>
                        <li><a href="index-5.html">Index 5</a></li>
                        <li><a href="index-6.html">Index 6</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Properties <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li>
                            <a href="#">List Layout <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="properties-list-rightside.html">Right Sidebar</a></li>
                                <li><a href="properties-list-leftside.html">Left Sidebar</a></li>
                                <li><a href="properties-list-fullwidth.html">Fullwidth</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Grid Layout<em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="properties-grid-rightside.html">Right Sidebar</a></li>
                                <li><a href="properties-grid-leftside.html">Left Sidebar</a></li>
                                <li><a href="properties-grid-fullwidth.html">Fullwidth</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Map View <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="properties-map-rightside-list.html">Map List 1</a></li>
                                <li><a href="properties-map-leftside-list.html">Map List 2</a></li>
                                <li><a href="properties-map-rightside-grid.html">Map Grid 1</a></li>
                                <li><a href="properties-map-leftside-grid.html">Map Grid 2</a></li>
                                <li><a href="properties-map-full.html">Map FullWidth</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Property Detail <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="properties-details.html">Property Detail 1</a></li>
                                <li><a href="properties-details-2.html">Property Detail 2</a></li>
                                <li><a href="properties-details-3.html">Property Detail 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Agents <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li><a href="agent-listing-grid.html">Agent grid</a></li>
                        <li><a href="agent-listing-grid-sidebar.html">Agent Grid sidebarbar</a></li>
                        <li><a href="agent-listing-row.html">Agent list</a></li>
                        <li><a href="agent-listing-row-sidebar.html">Agent List Sidebarbar</a></li>
                        <li><a href="agent-single.html">Agent Detail</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Pages <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li>
                            <a href="#">About<em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="about.html">About 1</a></li>
                                <li><a href="about-2.html">About 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Services<em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="services-1.html">Services 1</a></li>
                                <li><a href="services-2.html">Services 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Pricing Tables <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="pricing-tables.html">Pricing Tables 1</a></li>
                                <li><a href="pricing-tables-2.html">Pricing Tables 2</a></li>
                                <li><a href="pricing-tables-3.html">Pricing Tables 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Faq <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="faq.html">Faq 1</a></li>
                                <li><a href="faq-2.html">Faq 2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Gallery<em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="gallery-1.html">Gallery 1</a></li>
                                <li><a href="gallery-2.html">Gallery 2</a></li>
                                <li><a href="gallery-3.html">Gallery 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Contact <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="contact.html">Contact 1</a></li>
                                <li><a href="contact-2.html">Contact 2</a></li>
                                <li><a href="contact-3.html">Contact 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="properties-comparison.html">Properties Comparison</a>
                        </li>
                        <li>
                            <a href="search-brand.html">Search Brand</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="elements.html">Elements</a>
                        </li>
                        <li>
                            <a href="icon.html">Icon</a>
                        </li>
                        <li>
                            <a href="404.html">Pages 404</a>
                        </li>
                        <li>
                            <a href="user-profile.html">User Profile</a>
                        </li>
                        <li>
                            <a href="my-properties.html">My Properties</a>
                        </li>
                        <li>
                            <a href="favorited-properties.html">Favorited properties</a>
                        </li>
                        <li>
                            <a href="login.html">Login</a>
                        </li>
                        <li>
                            <a href="signup.html">Signup</a>
                        </li>
                        <li>
                            <a href="forgot-password.html">Forgot Password</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Blog <em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li>
                            <a href="#">Blog Classic <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="blog-classic-sidebar-right.html">Right Sidebar</a></li>
                                <li><a href="blog-classic-sidebar-left.html">Left Sidebar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Blog Columns <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="blog-columns-2col.html">2 Columns</a></li>
                                <li><a href="blog-columns-3col.html">3 Columns</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Blog Details <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <li><a href="blog-single-sidebar-right.html">Right Sidebar</a></li>
                                <li><a href="blog-single-sidebar-left.html">Left Sidebar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="submit-property.html">Submit Property</a>
                </li>
            </ul>
        </div>
        <div class="get-in-touch">
            <h3 class="heading">Get in Touch</h3>
            <div class="sidebar-contact-info">
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="body-info">
                    <a href="tel:0477-0477-8556-552">0477 8556 552</a>
                </div>
            </div>
            <div class="sidebar-contact-info">
                <div class="icon">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="body-info">
                    <a href="#">info@themevessel.com</a>
                </div>
            </div>
            <div class="sidebar-contact-info mb-0">
                <div class="icon">
                    <i class="fa fa-fax"></i>
                </div>
                <div class="body-info">
                    <a href="tel:0477-0477-8556-552">0266 8556 787</a>
                </div>
            </div>
        </div>
        <div class="get-social">
            <h3 class="heading">Get Social</h3>
            <a href="#" class="facebook-bg">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="twitter-bg">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="#" class="google-bg">
                <i class="fa fa-google"></i>
            </a>
            <a href="#" class="linkedin-bg">
                <i class="fa fa-linkedin"></i>
            </a>
        </div>
    </div>
</nav>