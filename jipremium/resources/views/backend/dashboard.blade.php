@extends('layout.layout_admin')
@section('dashboard', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        {{-- <h1 class="h3 mb-3"><strong>Dashboard</strong> Partners</h1> --}}
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h1 class="mt-1 mb-3">Official Partner</h1>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="user-check"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <a href="{{ url('admin/partners') }}" class="btn btn-primary btn-lg">Check <i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h1 class="mt-1 mb-3">Family Exhibition</h1>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <a href="{{ url('admin/exhibition/') }}" class="btn btn-primary btn-lg">Check <i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</main>
@endsection
