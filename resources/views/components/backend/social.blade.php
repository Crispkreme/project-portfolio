<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
    <div class="px-lg-2">
        @foreach ($items as $item)
            <div class="row g-0">
                @foreach ($item as $brand)
                    <div class="col">
                        <a class="dropdown-icon-item" href="{{ $brand['url'] }}">
                            <img src="{{ $brand['image'] }}" alt="{{ $brand['alt'] }}">
                            <span>{{ $brand['name'] }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>