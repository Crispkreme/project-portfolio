<div class="modal fade" id="createAboutModal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add About</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.store.about') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf

                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title" value="{{ old('title') }}" required>
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
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{ old('subtitle') }}" required>
                            <div class="invalid-feedback">
                                @error('subtitle')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" name="description" rows="2" placeholder="Description"></textarea>
                            <div class="invalid-feedback">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="content" class="form-label">Content</label>
                            <textarea id="content" placeholder="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}" name="content" rows="2"></textarea>
                            <div class="invalid-feedback">
                                @error('content')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="about_image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('about_image') is-invalid @enderror" id="about_image" name="about_image" required>
                            <div class="invalid-feedback">
                                @error('about_image')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-plus" style="margin-right: 10px;"></i>
                            Add About
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
