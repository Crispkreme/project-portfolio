<div class="modal fade" id="updateSkillModal-{{ $item->id }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.update.skill', ['id' => $item->id]) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf 
                    
                    <div class="mb-3 position-relative">
                        <label for="skill" class="form-label">Skill</label>
                        <input type="text" class="form-control @error('skill') is-invalid @enderror" id="skill" name="skill" placeholder="Skill" value="{{ old('skill', $item->skill) }}">
                        <div class="invalid-feedback">
                            @error('skill')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                
                    <div class="mb-3 position-relative">
                        <label for="skill_type" class="form-label">Type</label>
                        <select class="form-select @error('skill_type') is-invalid @enderror" aria-label="Skill Type" id="skill_type" name="skill_type">
                            <option disabled selected value="">Select Skill Type</option>
                            <option value="1" {{ old('skill_type', $item->skill_type) == '1' ? 'selected' : '' }}>Soft Skill</option>
                            <option value="2" {{ old('skill_type', $item->skill_type) == '2' ? 'selected' : '' }}>Core Skill</option>
                        </select>
                        <div class="invalid-feedback">
                            @error('skill_type')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                
                    <div class="mb-3 position-relative">
                        <label for="skill_image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('skill_image') is-invalid @enderror" id="skill_image" name="skill_image">
                        <div class="invalid-feedback">
                            @error('skill_image')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-plus" style="margin-right: 10px;"></i>
                        Update Skill
                    </button>
                </form>                
            </div>
        </div>
    </div>
</div>
