@extends('layout.layout_admin')
@section('dataEvent', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            @if ($message = Session::get('danger'))
            <button style="margin-bottom:20px;" class="btn btn-danger" disabled>
                    <p>{{ $message }}</p>
            </button>
            @endif

            <h1 class="h3 mb-3">
                <strong>Data</strong> Visitor
                <hr style="border-top: 2px solid black;">
            </h1>
            
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h1 class="mt-1 mb-3">Data Visitor Online </h1>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <a href="{{ url('admin/data-visitor-online/RNHFBBTKNHDCCIYFT556/EITWPREVOCTSGIEAS518') }}" class="btn btn-primary btn-lg">2024 <i class="align-middle" data-feather="chevron-right"></i></a> <a href="{{ url('admin/data-visitor-online/HWGJAIGYJNQPYBVMN321/LLZPRNKBIHZGXTGGK449') }}" class="btn btn-primary btn-lg">2025 <i class="align-middle" data-feather="chevron-right"></i></a>
							<a href="{{ url('admin/data-visitor-online/HJUQPPJEBJGJNSOBH299/JZECYWAHYMGADUGYA296') }}" class="btn btn-primary btn-lg">2026 <i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h1 class="mt-1 mb-3">Data Visitor Onsite</h1>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <a href="{{ url('admin/data-visitor-onsite/RNHFBBTKNHDCCIYFT556/INGOMCFWVINIUWOIU365') }}" class="btn btn-primary btn-lg">2024<i class="align-middle" data-feather="chevron-right"></i></a>
							  <a href="{{ url('admin/data-visitor-onsite/HWGJAIGYJNQPYBVMN321/ULPVHQQBZZFSYKKSM489') }}" class="btn btn-primary btn-lg">2025<i class="align-middle" data-feather="chevron-right"></i></a>
							  <a href="{{ url('admin/data-visitor-onsite/HJUQPPJEBJGJNSOBH299/MWTDIHYJJJWLQFBTF943') }}" class="btn btn-primary btn-lg">2026<i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <div class="container-fluid p-0" style="margin-top: 50px;">
        <div class="row">
            <h1 class="h3 mb-3">
                <strong>Data</strong> Buyer
                <hr style="border-top: 2px solid black;">
            </h1>
            
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h1 class="mt-1 mb-3">Data Buyer Online</h1>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <a href="{{ url('admin/data-buyer-online/IXKMYSUXFXCIOQCDQ620/SCAUNAQXWBGAFDJDZ968') }}" class="btn btn-primary btn-lg">2024 <i class="align-middle" data-feather="chevron-right"></i></a>
							<a href="{{ url('admin/data-buyer-online/URZLZXIFKLCKHDLRJ268/YGTQGVMQUJXTMZHWJ894') }}" class="btn btn-primary btn-lg">2025 <i class="align-middle" data-feather="chevron-right"></i></a>
							<a href="{{ url('admin/data-buyer-online/FWSCMNHJGCBHYDJOQ961/EVJXATXONKBKNDZTP807') }}" class="btn btn-primary btn-lg">2026 <i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h1 class="mt-1 mb-3">Data Buyer Onsite </h1>
                            </div>
                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0">
                            <a href="{{ url('admin/data-buyer-onsite/IXKMYSUXFXCIOQCDQ620/SBMVUDJOXHIDZMQKD951') }}" class="btn btn-primary btn-lg">2024 <i class="align-middle" data-feather="chevron-right"></i></a>
							<a href="{{ url('admin/data-buyer-onsite/URZLZXIFKLCKHDLRJ268/WKBAQPCNDMEJZZJGB686') }}" class="btn btn-primary btn-lg">2025 <i class="align-middle" data-feather="chevron-right"></i></a>
							<a href="{{ url('admin/data-buyer-onsite/FWSCMNHJGCBHYDJOQ961/CHCAFVPCJXRVBNNCQ764') }}" class="btn btn-primary btn-lg">2026 <i class="align-middle" data-feather="chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
