<div class="modal fade" id="updateSliderModal-{{ $item->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Portfolio Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.update.slider', ['id' => $item->id]) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ $item->title }}" required>
                            <div class="invalid-feedback">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="subtitle" class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{ $item->subtitle }}" required>
                            <div class="invalid-feedback">
                                @error('subtitle')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="images" class="form-label">Image</label>
                            <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images" value="{{ $item->images }}">
                            <div class="invalid-feedback">
                                @error('images')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="video_url" class="form-label">Video URL</label>
                            <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" placeholder="Video URL" value="{{ $item->video_url }}" required>
                            <div class="invalid-feedback">
                                @error('video_url')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-plus" style="margin-right: 10px;"></i>
                            Update Slider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
