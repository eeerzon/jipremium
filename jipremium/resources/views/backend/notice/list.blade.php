@extends('layout.layout_admin')
@section('notice', 'active')
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
                <h1 class="h3 mb-3"><strong>Notice</strong> List</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ url('admin/notice/create') }}" class="btn btn-success btn-sm">Add Data <i data-feather="plus"></i></a>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-12 col-sm-12 col-xxl-12 d-flex">
                <div class="card flex-fill table-responsive">
                    <table class="table table-hover my-0">
                        <thead style="background-color: #e6595f; color:white;">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                {{-- <th>Description</th> --}}
                                <th>Asset</th>
                                <th>Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notice as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><b>{{ $item->title }}</b></td>
                                {{-- <td>{{ $item->description }}</td> --}}
                                <td><img src="/public/image/{{ $item->asset }}" width="100px"></td>
                                <td>{{ $item->date }}</td>
                                <td style="text-align: center;">
                                    <form action="{{ route('notice.destroy',$item->id) }}" method="POST">
                                        <a href="{{ route('notice.edit',$item->id) }}" class="btn btn-sm btn-warning">Edit <i data-feather="edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this data?');" class="btn btn-sm btn-danger" type="submit">Delete <i data-feather="delete"></i></button>
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
                {!! $notice->links() !!}
            </div>
        </div>
    </div>
</main>
@endsection
