<section>
    <header>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        <div style="display: flex;justify-content: center;">
            <img 
            src="{{ asset('/storage/images/users/avatar-1.jpg') }}" 
            id="showImage" 
            class="rounded-circle" 
            height="200" 
            width="200" 
            alt="Card image cap">
        </div>

        <div>
            <x-inputs.input-label for="name" :value="__('Name')" />
            <x-inputs.text-input 
                id="name" 
                class="form-control"
                type="text" 
                name="name" 
                :value="old('name', $user->name)"
                autofocus 
                autocomplete="name" 
                readonly
            />
            <x-inputs.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-inputs.input-label for="email" :value="__('Email Address')" />
            <x-inputs.text-input 
                id="email" 
                name="email" 
                type="email" 
                class="form-control" 
                :value="old('email', $user->email)" 
                autocomplete="email" 
                readonly
            />
            <x-inputs.input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div class="mt-4">
            <x-inputs.input-label for="profile" :value="__('Profile Picture')" />
            <input name="profile_image" class="form-control" type="file" id="image">
        </div>
        <div class="flex items-center gap-4">
            <x-buttons.primary-button>
                {{ __('Update Profile') }}
            </x-buttons.primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush