@extends('layout.layout_admin')
@section('brand', 'active')
@section('content')

<main class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h3 class="mt-1 mb-3">Data Brands </h3>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <a href="{{ url('admin/brand') }}" class="btn btn-primary btn-lg">Check <i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h3 class="mt-1 mb-3">Data Products</h3>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <a href="{{ url('admin/product') }}" class="btn btn-primary btn-lg">Check <i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h3 class="mt-1 mb-3">Data Categories</h3>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <a href="{{ url('admin/category') }}" class="btn btn-primary btn-lg">Check <i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
