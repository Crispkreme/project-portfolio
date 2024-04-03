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
                        $title = "Portfolio Skill"; 
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
                                    data-bs-target="#createSkillModal"
                                >
                                    <i class="fas fa-plus" style="margin-right: 10px;"></i>
                                    Add Skill
                                </button>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    
                                    @php
                                        $links = [
                                            ['url' => 'javascript:void(0);', 'label' => 'Sales Report'], 
                                            ['url' => 'javascript:void(0);', 'label' => 'Export Report'], 
                                            ['url' => 'javascript:void(0);', 'label' => 'Profit'], 
                                            ['url' => 'javascript:void(0);', 'label' => 'Action'], 
                                        ];
                                    @endphp

                                    <x-backend.table-dropdown :links="$links" />

                                    <h4 class="card-title mb-4">Latest Transactions</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="text-center">ID</th>
                                                    <th>Skill</th>
                                                    <th>Type</th>
                                                    <th>Image</th>
                                                    <th class="text-center">Active</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($skills as $key => $item)
                                                    <tr>
                                                        <td class="text-center">{{ $key + 1 }}</td>
                                                        <td>{{ $item->skill }}</td>
                                                        <td>{{ $item->skill_type }}</td>
                                                        <td>{{ $item->skill_image }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                                <input type="checkbox" id="switch1" switch="none" @if($item->isActive == 1) checked @endif>
                                                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                                            </div>   
                                                        </td>                                                        
                                                        <td style="text-align: center;">
                                                            <button class="btn btn-info sm" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#updateSkillModal-{{ $item->id }}" 
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

                                                    @include('backend.modals.update-skill-modals', ['item' => $item])

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

    @include('backend.modals.create-skill-modals');
    
</x-app-layout>
