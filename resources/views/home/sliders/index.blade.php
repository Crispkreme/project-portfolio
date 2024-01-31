<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog Category All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="display:flex;justify-content:space-between;margin-bottom:10px;">
                                <h4 class="card-title">Blog Category All Data </h4>
                                <a href="{{ route('create.slider') }}" type="button" class="btn btn-success waves-effect waves-light">
                                    <i class="ri-add-circle-line align-middle"></i> Add Slider
                                </a>
                            </div>
                            
                            <table id="datatable" class="table table-bordered dt-responsive"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;" class="text-center">ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th style="width: 30%;">video URL</th>
                                        <th style="width: 5%;" class="text-center">Display</th>
                                        <th style="width: 5%;" class="text-center">Status</th>
                                        <th style="width: 10%;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $key => $item)
                                        <tr style="vertical-align:middle;">
                                            <th class="text-center" style="width: 5%;">{{ $key + 1 }}</th>
                                            <th>{{ $item->title }}</th>
                                            <th>{{ $item->sub_title }}</th>
                                            <th style="width: 30%;">{{ $item->video_url }}</th>
                                            <th style="width: 5%;">
                                                <div class="text-center" dir="ltr">
                                                    <input type="checkbox" id="square-switch-{{ $key + 1}}" switch="none" {{ $item->isDisplay == 1 ? 'checked' : '' }}>
                                                    <label for="square-switch-{{ $key + 1}}"
                                                        data-on-label="Active"
                                                        data-off-label="Inactive"
                                                        onclick="toggleSwitchIsDisplay({{ $key }}, '{{ route('slider.update.inactive.display', $item->id) }}','{{ route('slider.update.active.display', $item->id) }}')"
                                                    ></label>
                                                </div>                                               
                                            </th>
                                            <th style="width: 5%;">
                                                <div class="text-center" dir="ltr">
                                                    <input type="checkbox" id="square-switch-{{ $key + 1}}" switch="none" {{ $item->isActive == 1 ? 'checked' : '' }}>
                                                    <label for="square-switch-{{ $key + 1}}"
                                                        data-on-label="Active"
                                                        data-off-label="Inactive"
                                                        onclick="toggleSwitchIsActive({{ $key }}, '{{ route('slider.update.inactive.status', $item->id) }}','{{ route('slider.update.active.status', $item->id) }}')"
                                                    ></label>
                                                </div>                                               
                                            </th>
                                            <th style="width: 10%;" class="text-center">
                                                <a href="{{ route('edit.slider', $item->id) }}" type="button" class="btn btn-warning waves-effect waves-light">
                                                    <i class="ri-ball-pen-line align-middle"></i>
                                                </a>
                                                <a href="" type="button" class="btn btn-danger waves-effect waves-light">
                                                    <i class="ri-delete-bin-6-line align-middle"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>

    <script>
        function toggleSwitchIsActive(key, activeRoute, notActiveRoute) {
            var checkbox = document.getElementById('square-switch-' + (key + 1));
            var route = checkbox.checked ? activeRoute : notActiveRoute;
            
            if (route) {
                fetch(route, { method: 'POST' })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            checkbox.checked = !checkbox.checked;
                        } else {
                            console.error('Error:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
        function toggleSwitchIsDisplay(key, activeRoute, notActiveRoute) {
            var checkbox = document.getElementById('square-switch-' + (key + 1));
            var route = checkbox.checked ? activeRoute : notActiveRoute;
            
            if (route) {
                fetch(route, { method: 'POST' })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            checkbox.checked = !checkbox.checked;
                        } else {
                            console.error('Error:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>
</x-app-layout>
