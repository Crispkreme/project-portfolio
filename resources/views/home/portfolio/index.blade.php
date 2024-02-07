<x-app-layout>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Portfolio</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="display:flex;justify-content:space-between;margin-bottom:10px;">
                                <h4 class="card-title">List Portfolio </h4>
                                <a href="{{ route('create.portfolio') }}" type="button" class="btn btn-success waves-effect waves-light">
                                    <i class="ri-add-circle-line align-middle"></i> Add Portfolio
                                </a>
                            </div>
                            
                            <table id="datatable" class="table table-bordered dt-responsive"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;" class="text-center">ID</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th style="width: 20%;">Description</th>
                                        <th style="width: 20%;">Link</th>
                                        <th style="width: 10%;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($portfolios as $key => $item)
                                        <tr style="vertical-align:middle;">
                                            <th class="text-center" style="width: 5%;">{{ $key + 1 }}</th>
                                            <th>{{ $item->category->category }}</th>
                                            <th>{{ $item->title }}</th>
                                            <th>{{ $item->sub_title }}</th>
                                            <th style="width: 20%;">{{ $item->description }}</th>
                                            <th style="width: 20%;">{{ $item->url }}</th>
                                            <th style="width: 10%;" class="text-center">
                                                <a href="{{ route('edit.multi.image', $item->id) }}" type="button" class="btn btn-warning waves-effect waves-light">
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
