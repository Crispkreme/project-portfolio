<div class="dropdown float-end">
    <a href="#" class="dropdown-toggle arrow-none card-drop"
        data-bs-toggle="dropdown" aria-expanded="false">
        <i class="mdi mdi-dots-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        @foreach($links as $link)
            <a href="{{ $link['url'] }}" class="dropdown-item">{{ $link['label'] }}</a>
        @endforeach
    </div>
</div>