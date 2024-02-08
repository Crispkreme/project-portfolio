<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="display:flex;justify-content:space-between;margin-bottom:10px;">
                                <h4 class="card-title">Blog All Data </h4>
                                <a href="{{ route('create.blog') }}" type="button" class="btn btn-success waves-effect waves-light">
                                    <i class="ri-add-circle-line align-middle"></i> Add Blog
                                </a>
                            </div>
                            
                            <table id="datatable" class="table table-bordered dt-responsive"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;" class="text-center">ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th style="width: 30%;">Description</th>
                                        <th>Author</th>
                                        <th style="width: 10%;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $key => $item)
                                        <tr style="vertical-align:middle;">
                                            <th class="text-center" style="width: 5%;">{{ $key + 1 }}</th>
                                            <th>{{ $item->title }}</th>
                                            <th>{{ $item->category->category }}</th>
                                            <th>{{ $item->tags }}</th>
                                            <th style="width: 30%;">{{ $item->description }}</th>
                                            <th>{{ $item->user->name }}</th>
                                            <th style="width: 10%;" class="text-center">
                                                <a href="{{ route('edit.about', $item->id) }}" type="button" class="btn btn-warning waves-effect waves-light">
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
</x-app-layout>
