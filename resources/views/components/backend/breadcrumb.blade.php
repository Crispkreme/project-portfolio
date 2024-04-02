<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $title }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach($links as $link)
                        <li class="breadcrumb-item"><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>