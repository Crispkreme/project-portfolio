<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="display:flex;justify-content:center;align-items:center;">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ Storage::url('images/logo-sm.png') }}" alt="logo-sm" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ Storage::url('images/logo-dark.png') }}" alt="logo-dark" height="20">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ Storage::url('images/logo-sm.png') }}" alt="logo-sm" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ Storage::url('images/logo-dark.png') }}" alt="logo-dark" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-apps-2-line"></i>
                </button>

                @php
                    $items = [
                        [
                            ['url' => '#', 'image' => Storage::url('images/brands/gmail.png'), 'alt' => 'Gmail', 'name' => 'Gmail'],
                            ['url' => '#', 'image' => Storage::url('images/brands/facebook.png'), 'alt' => 'Facebook', 'name' => 'Facebook'],
                            ['url' => '#', 'image' => Storage::url('images/brands/instagram.png'), 'alt' => 'Instagram', 'name' => 'Instagram'],
                            ['url' => '#', 'image' => Storage::url('images/brands/telegram.png'), 'alt' => 'Telegram', 'name' => 'Telegram'],
                            ['url' => '#', 'image' => Storage::url('images/brands/youtube.png'), 'alt' => 'Youtube', 'name' => 'Youtube'],
                        ],
                        [
                            ['url' => '#', 'image' => Storage::url('images/brands/messenger.png'), 'alt' => 'Messenger', 'name' => 'Messenger'],
                            ['url' => '#', 'image' => Storage::url('images/brands/phone.png'), 'alt' => 'Phone', 'name' => 'Phone'],
                            ['url' => '#', 'image' => Storage::url('images/brands/slack.png'), 'alt' => 'Slack', 'name' => 'Slack'],
                            ['url' => '#', 'image' => Storage::url('images/brands/twitter.png'), 'alt' => 'Twitter', 'name' => 'Twitter'],
                            ['url' => '#', 'image' => Storage::url('images/brands/whatsapp.png'), 'alt' => 'Whatsapp', 'name' => 'Whatsapp'],
                        ],
                    ];
                @endphp

                <x-backend.social :items="$items" />
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="ri-shopping-cart-line"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="{{ Storage::url('images/users/avatar-3.jpg') }}"
                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="flex-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="{{ Storage::url('images/users/avatar-4.jpg') }}"
                                    class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="flex-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.
                                        </p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" 
                    class="btn header-item waves-effect" 
                    id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false"
                    style="display: flex;align-items: center;">
                    <img class="rounded-circle header-profile-user" 
                        src="{{ Storage::url('profiles/'.Auth::user()->profile_image) }}"
                        alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1">
                            {{ ucwords(Auth::user()->name) }}
                        </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>

                @php
                    if(Auth::user()->isAdmin == 1) {
                        $links = [
                            ['url' => route('admin.profile.edit'), 'label' => 'Profile', 'icon' => 'ri-user-line align-middle me-1'],
                            ['url' => '#', 'label' => 'My Wallet', 'icon' => 'ri-wallet-2-line align-middle me-1'],
                            ['url' => '#', 'label' => 'Settings', 'icon' => 'ri-settings-2-line align-middle me-1'],
                            ['url' => '#', 'label' => 'Lock screen', 'icon' => 'ri-lock-unlock-line align-middle me-1'],
                            ['url' => route('admin.logout'), 'label' => 'Logout', 'icon' => 'ri-shut-down-line align-middle me-1 text-danger', 'form' => true],
                        ];
                    } else {
                        $links = [
                            ['url' => route('profile.edit'), 'label' => 'Profile', 'icon' => 'ri-user-line align-middle me-1'],
                            ['url' => '#', 'label' => 'My Wallet', 'icon' => 'ri-wallet-2-line align-middle me-1'],
                            ['url' => '#', 'label' => 'Settings', 'icon' => 'ri-settings-2-line align-middle me-1'],
                            ['url' => '#', 'label' => 'Lock screen', 'icon' => 'ri-lock-unlock-line align-middle me-1'],
                            ['url' => route('logout'), 'label' => 'Logout', 'icon' => 'ri-shut-down-line align-middle me-1 text-danger', 'form' => true],
                        ];
                    }
                @endphp
                <div class="dropdown-menu dropdown-menu-end">
                    <x-backend.dropdown :links="$links" />
                </div>

            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="ri-settings-2-line"></i>
                </button>
            </div>

        </div>
    </div>
</header>