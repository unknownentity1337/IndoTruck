<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>

    @can('owner')
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Owner</h4>
                    </div>
                    <div class="card-body">
                        <p>Owner</p>
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('admin')
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin</h4>
                    </div>
                    <div class="card-body">
                        <p>Admin</p>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</x-app-layout>
