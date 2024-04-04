@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
@endpush

<div class="modal fade" id="createExperienceModal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.store.experience') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Company" value="{{ old('title') }}" required>
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
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" rows="2" placeholder="Address"></textarea>
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
                            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" placeholder="Position" value="{{ old('position') }}" required>
                            <div class="invalid-feedback">
                                @error('position')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="skill_id" class="form-label">Multiple Select</label>
                            <select id="skill_id" name="skill_id[]" class="select2 form-control select2-multiple select2-hidden-accessible @error('skill_id') is-invalid @enderror" multiple="" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true">
                                @foreach($skills as $key => $item)
                                    <option value="{{ $item->id }}">{{ $item->skill }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                @error('skill_id')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>                                       
                    <div class="row">
                        <div class="mb-3 position-relative">
                            <label for="job_description" class="form-label">Job Description</label>
                            <textarea id="job_description" placeholder="Job Description" class="form-control @error('job_description') is-invalid @enderror" value="{{ old('job_description') }}" name="job_description" rows="2"></textarea>
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
                                <input type="date" id="input-date1" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy">
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
                                <input type="date" id="input-date1" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy">
                                <span class="text-muted">leave blank if still present</span>
                                <div class="invalid-feedback">
                                    @error('about_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-plus" style="margin-right: 10px;"></i>
                            Add Experience
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
@endpush
