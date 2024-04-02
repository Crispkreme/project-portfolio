<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary waves-effect waves-light']) }} type="button" style="width:100%;margin-top: 2rem;display:flex;justify-content:center;">
    {{ $slot }}
</button>