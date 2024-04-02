@if(Request::is('admin.password.request'))
    <x-guest-layout>
        <x-errors.auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-inputs.input-label for="username" :value="__('Username')" />
                <x-inputs.text-input 
                    id="username" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="username" 
                    :value="old('username')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                />
                <x-inputs.input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-inputs.input-label for="password" :value="__('Password')" />
                <x-inputs.text-input 
                    id="password" 
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    required 
                />
                <x-inputs.input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                        name="remember"
                    >
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-buttons.primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-buttons.primary-button>
            </div>
        </form>
    </x-guest-layout>
@else
    <x-app-layout>
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">
    
                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="assets/images/logo-dark.png" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="assets/images/logo-light.png" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>
    
                        <div class="p-3">
                            <x-errors.auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('password.email') }}" class="form-horizontal mt-3">
                                @csrf
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    Enter Your <strong>E-mail</strong> and instructions will be sent to you!
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                <div class="form-group mb-3">
                                    <x-inputs.input-label for="email" :value="__('Email')" />
                                    <x-inputs.text-input 
                                        id="email" 
                                        class="form-control" 
                                        type="text" 
                                        name="email" 
                                        :value="old('email')" 
                                        required 
                                        autofocus 
                                        autocomplete="email" 
                                    />
                                    <x-inputs.input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
    
                                <div class="form-group pb-2 text-center row mt-3">
                                    <div class="col-12">
                                        <x-buttons.primary-button class="btn btn-info w-100 waves-effect waves-light" style="display: flex;justify-content: center;">
                                            {{ __('Send Email') }}
                                        </x-buttons.primary-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
    </x-app-layout>
@endif