@extends('layout.layout_admin')
@section('brand', 'active')
@section('content')

<!-- External Libraries -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script> -->

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
                <h1 class="h3 mb-3"><strong>Dashboard</strong> Products</h1>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="search1" placeholder="Search Data..">
                </div>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('product.create') }}" class="btn btn-success">Add Data <i data-feather="plus"></i></a>
                <button id="openModalBtn" type="button" class="btn btn-success">Upload Excel <i data-feather="upload"></i></button>
                <button class="btn btn-danger" id="deleteSelectedBtn">Delete Selected <i data-feather="trash"></i></button>

                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span id="closeModalBtn" class="close">&times;</span>
                        <form action="{{ route('import.product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-top: 20px;">
                                <a href="https://jipremium.com/download/product_example.xlsx" style="text-align: left; margin-bottom: 10px;" download>See Format Import</a>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" name="excel_file" class="form-control">
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <button class="btn btn-success" type="submit">Submit File</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card flex-fill table-responsive">
                    <table class="table table-hover my-0">
                        <thead style="background-color: #e6595f; color: white;">
                            <tr>
                                <th><input type="checkbox" id="selectAllCheckbox"></th>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Brand</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($product as $data)
                                <tr>
                                    <td><input type="checkbox" name="selected_products[]" value="{{ $data->id }}"></td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->product_name }}</td>
                                    <td>
                                        @if ($data->product_image)
                                            <img src="{{ $data->product_image }}" width="100px" alt="Product Image">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ optional($data->brand)->brand_name }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-md btn-primary" type="button" id="actionDropdown{{ $data->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <i data-feather="arrow-down"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $data->id }}">
                                                <a class="dropdown-item" href="{{ route('product.edit', $data->id) }}">Edit <i data-feather="edit"></i></a>
                                                <form action="{{ route('product.destroy', $data->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="dropdown-item" onclick="return confirm('Are you sure you want to delete this data?');" type="submit">Delete <i data-feather="delete"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12 text-end">
                {!! $product->links() !!}
            </div>
        </div>
    </div>
</main>

<script>
    feather.replace();
</script>

<script>
    $(document).ready(function () {
        $("#search1").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $("#selectAllCheckbox").on("change", function () {
            $("input[name='selected_products[]']").prop("checked", $(this).prop("checked"));
        });

        $("#deleteSelectedBtn").on("click", function () {
            var selectedIds = [];
            $("input[name='selected_products[]']:checked").each(function () {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length === 0) {
                alert("No data selected for deletion.");
                return;
            }

            if (confirm("Are you sure you want to delete the selected data?")) {
                $.ajax({
                    url: "{{ route('delete.selected.products') }}",
                    type: "POST",
                    data: { selectedIds: selectedIds, _token: "{{ csrf_token() }}" },
                    success: function (response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            alert("An error occurred while deleting the data.");
                        }
                    },
                    error: function () {
                        alert("An error occurred while deleting the data.");
                    },
                });
            }
        });
    });
</script>
@endsection
