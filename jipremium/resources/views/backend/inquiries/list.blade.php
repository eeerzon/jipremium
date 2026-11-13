@extends('layout.layout_admin')
@section('inquiries', 'active')
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

            <div class="col-12 text-start">
                <h1 class="h3 mb-3"><strong>Inquiry</strong> List</h1>
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
                                <th>Email</th>
                                <th>Company</th>
                                <th>Country</th>
                                <th>Inquiry</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiries as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                <td>
                                    @if (!$item->email)
                                        -   
                                    @else
                                        {{ $item->email }}    
                                    @endif
                                </td>
                                <td>{{ $item->company }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->inquiry }}</td>
                                <td style="text-align: center;">
                                    <form action="{{ route('inquiries.destroy',$item->id) }}" method="POST">
                                        {{-- <a href="{{ route('inquiries.edit',$item->id) }}" class="btn btn-md btn-warning">Edit <i data-feather="edit"></i></a> --}}
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
                {!! $inquiries->links() !!}
            </div>
        </div>
    </div>
</main>
@endsection
