@extends('layout.layout_admin')
@section('image', 'active')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <h1 class="h3 mb-3"><strong>Dashboard</strong> Image</h1>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-6 col-lg-6 col-xxl-6">
                <div class="form-group">
                    {{-- <input type="text" class="form-control" id="search1" placeholder="Search Data.."> --}}
                    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control" name="images[]" multiple>
                </div>
            </div>
            <div class="col-6 text-end">
                    <button type="submit" class="btn btn-success">Upload Images <i data-feather="upload"></i></button>
                </form>
                <form action="{{ route('images.delete.selected') }}" method="POST" id="deleteSelectedForm">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="deleteSelectedBtn">Delete Selected</button>
                </form>
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
                                <th>ID</th>
                                <th>Images</th>
                                <th>Link</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @foreach ($images as $data)
                            <tr>
                                <td><input type="checkbox" name="selected_images[]" value="{{ $data->id }}"></td>
                                <td>{{ $data->id }}</td>
                                <td>
                                    @if ($data->image_path)
                                        <img src="{{ asset($data->image_path) }}"  width="100px">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ asset($data->image_path) }}</td>
                                <td style="text-align: center;">
                                    {{-- <button class="btn btn-primary" onclick="copyImageLink('{{ asset($data->image_path) }}')">Copy Link</button> --}}
                                    <button class="btn btn-primary" onclick="copyImageLink({{ json_encode(asset($data->image_path)) }})">Copy Link</button>
                                    <form action="{{ route('image.delete',$data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a href="{{ route('image.delete', ['id' => $data->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</a> --}}
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>

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
                {{ $images->links() }}
            </div>
        </div>
    </div>
</main>
<script>
    function copyImageLink(imageLink) {
        const textarea = document.createElement('textarea');
        textarea.value = imageLink;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        alert('Link has been copied');
    }
</script>

<script>
    $(document).ready(function () {
        $("#selectAllCheckbox").on("change", function () {
            $("input[name='selected_images[]']").prop("checked", $(this).prop("checked"));
        });

        $("#deleteSelectedBtn").on("click", function () {
            var selectedIds = [];
            $("input[name='selected_images[]']:checked").each(function () {
                selectedIds.push($(this).val());
            });

            if (selectedIds.length === 0) {
                alert("No data selected for deletion.");
                return;
            }

            if (confirm("Are you sure you want to delete the selected data?")) {
                $.ajax({
                    url: "{{ route('images.delete.selected') }}",
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
