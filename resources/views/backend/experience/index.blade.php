<x-app-layout>

    <!-- Begin page -->
    <div id="layout-wrapper">
        
        <x-backend.header />

        <x-backend.left-sidebar />

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @php
                        $title = "Portfolio Experience"; 
                        $links = [
                            ['url' => '#', 'label' => 'Portfolio'], 
                            ['url' => '#', 'label' => 'Slider']
                        ];
                    @endphp

                    <x-backend.breadcrumb :title="$title" :links="$links" />

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-2" style="display: flex;justify-content: flex-end;">
                                <button 
                                    type="button" 
                                    class="btn btn-primary waves-effect waves-light" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#createExperienceModal"
                                >
                                    <i class="fas fa-plus" style="margin-right: 10px;"></i>
                                    Add Experience
                                </button>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <a href="javascript:voidx(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Latest Transactions</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center">ID</th>
                                                    <th>Position</th>
                                                    <th>Company</th>
                                                    <th>Address</th>
                                                    <th>Responsibility</th>
                                                    <th>Skills</th>
                                                    <th class="text-center">Active</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($experiences as $key => $item)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td class="table-cell">{{ $item->position }}</td>
                                                        <td class="table-cell">{{ $item->company }}</td>
                                                        <td class="table-cell">{{ $item->address }}</td>
                                                        <td class="table-cell">{{ $item->job_description }}</td>
                                                        <td class="table-cell">{{ $item->skill->skill }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                                <input type="checkbox" id="switch1" switch="none" @if($item->isActive == 1) checked @endif>
                                                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                                            </div>                                                            
                                                        </td>                                                        
                                                        <td style="text-align: center;">
                                                            <button class="btn btn-info sm" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#updateExperienceModal-{{ $item->id }}" 
                                                                title="Edit Data">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <a class="btn btn-danger sm"
                                                                href="#"
                                                                title="Delete Data">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    @include('backend.modals.update-experience-modals', ['item' => $item])

                                                @endforeach
                                               
                                            </tbody>
                                        </table> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <x-backend.footer />

        </div>
    </div>

    <x-backend.right-sidebar />

    <div class="rightbar-overlay"></div>

    @include('backend.modals.create-experience-modals');
    
</x-app-layout>
