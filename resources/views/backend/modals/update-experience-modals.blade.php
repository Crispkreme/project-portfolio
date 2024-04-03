<div class="modal fade" id="updateExperienceModal-{{ $item->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.update.experience', ['id' => $item->id]) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf

                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Company" value="{{ $item->company }}" required>
                            <div class="invalid-feedback">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="address" class="form-label">Address</label>
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $item->address }}" name="address" rows="2" placeholder="Address"></textarea>
                            <div class="invalid-feedback">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Position" value="{{ $item->position }}" required>
                            <div class="invalid-feedback">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="job_description" class="form-label">Job Description</label>
                            <textarea id="job_description" placeholder="Job Description" class="form-control @error('job_description') is-invalid @enderror" value="{{ $item->job_description }}" name="job_description" rows="2"></textarea>
                            <div class="invalid-feedback">
                                @error('job_description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="input-date1">Starting Date</label>
                                <input id="input-date1" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy">
                                <span class="text-muted">e.g "dd/mm/yyyy"</span>
                                <div class="invalid-feedback">
                                    @error('about_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label" for="input-date1">End Date</label>
                                <input id="input-date1" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy">
                                <span class="text-muted">e.g "dd/mm/yyyy"</span>
                                <div class="invalid-feedback">
                                    @error('about_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
