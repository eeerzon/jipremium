@extends('layout.layout_admin')
@section('brand', 'active')
@section('content')

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

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
                <h1 class="h3 mb-3"><strong>Dashboard</strong> Brands</h1>
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
                <a href="{{ route('brand.create') }}" class="btn btn-success">Add Data <i data-feather="plus"></i></a>
                <button id="openModalBtn" type="button" class="btn btn-success">Upload Excel <i data-feather="upload"></i></button>
                <button class="btn btn-danger" id="deleteSelectedBtn">Delete Selected <i data-feather="trash"></i></button>
                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span id="closeModalBtn" class="close">&times;</span>
                        <form action="{{ route('import.brand') }}" method="POST" enctype="multipart/form-data" required>
                            @csrf
                            <div class="row" style="margin-top: 20px;">
                                <a href="https://jipremium.com/download/brand_import.xlsx" style="text-align: left; margin-bottom: 10px;" download>See Format Import</a>
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
                                <th><input type="checkbox" id="selectAllCheckbox"></th>
                                <th>#</th>
                                <th>Brand Name</th>
                                <th>Booth Number</th>
                                <th>CEO Name</th>
                                <th>Website</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($brand as $data)
                            <tr>
                                <td><input type="checkbox" name="selected_brands[]" value="{{ $data->id }}"></td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->brand_name }}</td>
                                <td>{{ $data->booth_no }}</td>
                                <td>{{ $data->ceo_name }}</td>
                                <td><a href="{{ $data->website }}">{{ $data->website }}</a></td>
                                <td>{{ $data->phone_number == 0 ? '-' : $data->phone_number }}</td>
                                <td>{{ $data->email ?? '-' }}</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-md btn-outline-{{ $data->status == '1' ? 'primary' : 'danger' }}">
                                        {{ $data->status == '1' ? 'Active' : 'Non-Active' }}
                                    </button>
                                </td>
                                <td style="text-align: center;">
                                    <div class="dropdown">
                                        <button class="btn btn-md btn-primary" type="button" id="actionDropdown{{ $data->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <i data-feather="arrow-down"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="actionDropdown{{ $data->id }}">
                                            <button class="dropdown-item toggle-status" data-id="{{ $data->id }}" data-status="{{ $data->status }}">
                                                {{ $data->status == '1' ? 'Set Non-Active' : 'Set Active' }} <i data-feather="{{ $data->status == '1' ? 'x-circle' : 'check-circle' }}"></i>
                                            </button>
                                            <a class="dropdown-item" href="{{ route('brand.edit', $data->id) }}">Edit <i data-feather="edit"></i></a>
                                            <form action="{{ route('brand.destroy', $data->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit" onclick="return confirm('Are you sure you want to delete this data?');">Delete <i data-feather="delete"></i></button>
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
            <div class="col-12" style="text-align: right;">
                {!! $brand->links() !!}
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        feather.replace();

        $("#search1").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $("#selectAllCheckbox").on("change", function () {
            $("input[name='selected_brands[]']").prop("checked", $(this).prop("checked"));
        });

        $("#deleteSelectedBtn").on("click", function () {
            var selectedIds = [];
            $("input[name='selected_brands[]']:checked").each(function () {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length === 0) {
                alert("No data selected for deletion.");
                return;
            }

            if (confirm("Are you sure you want to delete the selected data?")) {
                $.ajax({
                    url: "{{ route('delete.selected.brands') }}", 
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

        $("#openModalBtn").on("click", function () {
            $("#modal").show();
        });

        $("#closeModalBtn").on("click", function () {
            $("#modal").hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".toggle-status").on("click", function () {
            var button = $(this);
            var brandId = button.data('id');
            var currentStatus = button.data('status');
            $.ajax({
                url: "/brand/toggle-status/" + brandId,
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success) {
                        if (response.status === '1') {
                            button.html('Set Non-Active <i data-feather="x-circle"></i>');
                            button.data('status', '1');
                        } else {
                            button.html('Set Active <i data-feather="check-circle"></i>');
                            button.data('status', '0');
                        }
                        
                        var mainStatusButton = $('tr').find(`[data-id="${brandId}"]`).closest('tr').find('.btn-outline-primary, .btn-outline-danger');
                        if (response.status === '1') {
                            mainStatusButton.removeClass('btn-outline-danger').addClass('btn-outline-primary');
                            mainStatusButton.text('Active');
                        } else {
                            mainStatusButton.removeClass('btn-outline-primary').addClass('btn-outline-danger');
                            mainStatusButton.text('Non-Active');
                        }
                        
                        feather.replace();
                    } else {
                        alert("An error occurred while toggling the status.");
                    }
                },
                error: function () {
                    alert("An error occurred while toggling the status.");
                },
            });
        });
    });
</script>

@endsection
