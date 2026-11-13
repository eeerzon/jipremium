@extends('layout.layout_admin')
@section('brand', 'active')
@section('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
                <h1 class="h3 mb-3"><strong>Dashboard</strong> Categories</h1>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-6 col-lg-6 col-xxl-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="search1" placeholder="Search Data..">
                </div>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('category.create') }}" class="btn btn-success btn-md">Add Data <i data-feather="plus"></i></a>
                <button id="openModalBtn" type="button" class="btn btn-success">Upload Excel <i data-feather="upload"></i></button>
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span id="closeModalBtn" class="close">&times;</span>
                        <form action="{{ route('import.category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6 col-sm-6"><input type="file" name="excel_file"></div>
                                <div class="col-md-6 col-sm-6"><button class="btn btn-success" type="submit">Submit File</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill table-responsive">
                    <table class="table table-hover my-0">
                        <thead style="background-color: #e6595f; color:white;">
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($category as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->category_name }}</td>
                                <td style="text-align: center;">
                                    <form action="{{ route('category.destroy',$data->id) }}" method="POST">
                                        <a href="{{ route('category.edit',$data->id) }}" class="btn btn-md btn-warning">Edit <i data-feather="edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this data?');" class="btn btn-md btn-danger" type="submit">Delete<i data-feather="delete"></i></button>
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
                {!! $category->links() !!}
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        $("#search1").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection
