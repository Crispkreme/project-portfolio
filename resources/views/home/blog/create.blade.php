<x-app-layout>

    @push('styles')
        <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title" style="margin-bottom: 2%;margin-top: 2%;">Add Portfolio </h4>

                            <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="title" class="form-control" type="text" id="example-text-input">
                                        @error('title')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tags </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tags" value="" class="form-control" data-role="tagsinput" placeholder="Add tags"/>
                                        @error('tags')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category </label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="category_id">
                                            <option selected disabled>Select Category</option>
                                            <optgroup label="Category">
                                                @if (empty($categories))
                                                    <option value="" disabled>No data found</option>
                                                @else
                                                    @foreach ($categories as $key => $item)
                                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Description
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="description"></textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image </label>
                                    <div class="col-sm-10">
                                        <input name="screenshot" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->

                                <button type="submit" class="btn btn-info waves-effect waves-light">
                                    <i class="ri-add-circle-line align-middle"></i> Portfolio Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });

            $(document).ready(function() {
                $('input[data-role="tagsinput"]').tagsinput();
            });
        </script>
    @endpush

</x-app-layout>
