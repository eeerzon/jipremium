@extends('layout.layout_admin')
@section('dashboard', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('partners.index') }}" class="btn btn-md btn-primary" style="margin-bottom: 20px;"><i data-feather="arrow-left"></i> Back</a>
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
                <h1 class="h3 mb-3"><strong>Asset</strong> List</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('asset.create') }}" class="btn btn-success btn-md">Add Data <i data-feather="plus"></i></a>
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
                                <th>Asset</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($partnerAsset as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                @foreach($item->partner()->get() as $items)
                                    <td>{{ $items->name }}</td>
                                @endforeach
                                <td><img src="/public/image/{{ $item->img }}" width="100px"></td>
                                <td style="text-align: center;">
                                    <form action="{{ route('asset.destroy',$item->id) }}" method="POST">
                                        {{-- <a href="{{ route('asset.edit',$item->id) }}" class="btn btn-md btn-warning">Edit <i data-feather="edit"></i></a> --}}
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
        </div><br>
        <div class="row">
            <div class="col-12" style="text-align: right;">
                {!! $partnerAsset->links() !!}
            </div>
        </div>
    </div>
</main>
@endsection
