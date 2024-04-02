@if(Route::is('admin.profile.edit'))
    <x-app-layout>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <x-backend.header />

            <x-backend.left-sidebar />

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @php
                            $title = 'Profile';
                            $links = [['url' => '#', 'label' => 'Portfolio'], ['url' => '#', 'label' => $title ]];
                        @endphp

                        <x-backend.breadcrumb :title="$title" :links="$links" />

                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">

                                                <h4 class="mb-2">Profile Information</h4>

                                                @include(Route::is('admin.profile.edit') ? 'profile.backend.profile-information-form' : 'profile.partials.profile-information-form')
                                            
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-account-pin-box-line font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">

                                                <h4 class="mb-2">Profile Information</h4>

                                                @include(Route::is('admin.profile.edit') ? 'profile.backend.update-profile-information-form' : 'profile.partials.update-profile-information-form')

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-card-bulleted-outline font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">

                                                <h4 class="mb-2">Update Password</h4>

                                                @include(Route::is('admin.profile.edit') ? 'profile.backend.update-password-form' : 'profile.partials.update-password-form')

                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-account-key-outline font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">

                                                <h4 class="mb-2">Delete Account</h4>

                                                @include(Route::is('admin.profile.edit') ? 'profile.backend.delete-user-form' : 'profile.partials.delete-user-form')
                                            
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-trash-can-outline font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <x-backend.footer />

            </div>
        </div>

        <x-backend.right-sidebar />

        <div class="rightbar-overlay"></div>

    </x-app-layout>
@else
    <x-guest-layout>
    </x-guest-layout>
@endif
