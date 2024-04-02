@if(Request::is('login'))
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
        <!-- Session Status -->
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
                        <h4 class="text-muted text-center font-size-18"><b>Personal Portfolio</b></h4>
                        <div class="p-3">
                            <x-errors.auth-session-status class="mb-4" :status="session('status')" />
                            <form method="POST" action="{{ route('admin.login.store') }}" class="form-horizontal mt-3">
                                @csrf
                    
                                <!-- Email Address -->
                                <div>
                                    <x-inputs.input-label for="username" :value="__('Username')" />
                                    <x-inputs.text-input 
                                        id="username" 
                                        class="form-control" 
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
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        autocomplete="current-password"
                                        required 
                                    />
                                    <x-inputs.input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                    
                                <!-- Remember Me -->
                                <div class="block mt-4" style="display: flex;justify-content: space-between;">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input 
                                            id="remember_me" 
                                            type="checkbox" 
                                            class="custom-control-input" 
                                            name="remember"
                                        >
                                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a class="text-muted" href="{{ route('admin.password.request') }}">
                                            <i class="mdi mdi-lock"></i>
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                    
                                <div class="flex items-center justify-end mt-4">
                                    <x-buttons.primary-button class="btn btn-info w-100 waves-effect waves-light" style="display: flex;justify-content: center;">
                                        {{ __('Log in') }}
                                    </x-buttons.primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endif