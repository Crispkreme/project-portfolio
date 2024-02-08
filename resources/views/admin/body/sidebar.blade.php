 <div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-slideshow-4-line"></i>
                        <span>Portfolio Slider</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('create.slider') }}">Add Slider</a></li>
                        <li><a href="{{ route('slider') }}">List Slider</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-fingerprint-2-line"></i>
                        <span>About Me</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('create.about') }}">Add About</a></li>
                        <li><a href="{{ route('about') }}">List About</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Portfolio</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('create.portfolio') }}">Add Portfolio</a></li>
                        <li><a href="{{ route('portfolio') }}">List Portfolio</a></li>
                    </ul>
                </li>
                <li class="menu-title">Pages</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-pages-line"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('blog') }}">Add Blog</a></li>
                        <li><a href="{{ route('add.blog.category') }}">All Blog</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Blog Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.blog') }}">All Blog</a></li>
                        <li><a href="{{ route('add.blog') }}">Add Blog</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Footer Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('footer.setup') }}">Footer Setup</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Contact Message </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('contact.message') }}">Contact Message</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
     </div>
 </div>
