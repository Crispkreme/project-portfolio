@foreach($links as $link)
    @if(isset($link['form']) && $link['form'])
        <form method="POST" action="{{ $link['url'] }}">
            @csrf
            <button type="submit" class="dropdown-item">
                <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
            </button>
        </form>
    @else
        <a href="{{ $link['url'] }}" class="dropdown-item">
            <i class="{{ $link['icon'] }}"></i> {{ $link['label'] }}
        </a>
    @endif
@endforeach