@extends('layout.layout_admin')
@section('dashboard', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            @if ($message = Session::get('success'))
            <button style="margin-bottom:20px;" class="btn btn-success" disabled>
                    <p>{{ $message }}</p>
            </button>
            @endif

            @if ($message = Session::get('danger'))
            <button style="margin-bottom:20px;" class="btn btn-danger" disabled>
                    <p>{{ $message }}</p>
            </button>
            @endif

            <div class="col-6 text-start">
                <h1 class="h3 mb-3"><strong>Dashboard</strong> Partners</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ url('admin/asset/list') }}" class="btn btn-primary btn-md">List Image <i data-feather="image"></i></a>
                <a href="{{ url('admin/partners/create') }}" class="btn btn-success btn-md">Add Data <i data-feather="plus"></i></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill table-responsive">
                    <table class="table table-hover my-0">
                        <thead style="background-color: #e6595f; color:white;">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:white;">
                            @foreach ($partners as $partner)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $partner->name }}</td>
                                <td style="text-align: center;">
                                    <form action="{{ route('partners.destroy',$partner->id) }}" method="POST">
                                        <a href="{{ route('partners.edit',$partner->id) }}" class="btn btn-md btn-warning">Edit <i data-feather="edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this data?');" class="btn btn-md btn-danger" type="submit">Delete <i data-feather="delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: right;">
                {!! $partners->links() !!}
            </div>
        </div>
    </div>
</main>
@endsection
