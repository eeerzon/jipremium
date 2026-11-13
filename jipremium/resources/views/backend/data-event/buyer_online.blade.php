@extends('layout.layout_admin')
@section('dataEvent', 'active')
@section('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
    .nav-pills .nav-link.active, .dropdown .btn {
        border-bottom: 3px solid #3E3E3E;
        border-radius: 0;
        background-color: transparent;
        color: #3E3E3E;
    }

    a.active {
        color: #C00 !important;
    }

    .nav-pills .nav-link {
        color: black;
    }
</style>

<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-sm-12 text-start">
                <h1 class="h3 mb-3"><strong>{{$judul}}</strong></h1>
            </div>
        </div>
        <br>
        <div class="row" style="text-align: center;">
            <div class="col-4 col-lg-4 col-xxl-4">
                <div class="card text-white bg-white">
                    <div class="card-header" style="background-color: #e6595f; color:white;">Participant</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalParticipant }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 col-lg-4 col-xxl-4">
                <div class="card text-white bg-white">
                    <div class="card-header" style="background-color: #e6595f; color:white;">Checked In</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalCheckIn }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 col-lg-4 col-xxl-4">
                <div class="card text-white bg-white">
                    <div class="card-header" style="background-color: #e6595f; color:white;">Not Check In</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $totalNotCheck }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <ul class="nav nav-pills" id="myTab" role="tablist">
            <li>
                <a class="nav-link active" id="not-check-in" data-toggle="pill" href="#not-check" role="tab" aria-controls="not-check" aria-selected="true">NOT CHECK IN</a>
            </li>
            <li>
                <a class="nav-link" id="check-in" data-toggle="pill" href="#check" role="tab" aria-controls="check" aria-selected="false">CHECKED IN</a>
            </li>
        </ul>
        <br>
        {{-- <div class="row">
            <div class="col-6 col-lg-6 col-xxl-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="search" placeholder="Search Data..">
                </div>
            </div>
            <div class="col-6 col-lg-6 col-xxl-6 text-end">
                <button type="button" class="btn btn-success ml-auto" id="download-btn">Download Excel</button>
            </div>
        </div>
        <br> --}}
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="not-check" role="tabpanel" aria-labelledby="not-check-in">
                <div class="row">
                    <div class="col-6 col-lg-6 col-xxl-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search1" placeholder="Search Data..">
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-xxl-6 text-end">
                        <button type="button" class="btn btn-success ml-auto" id="download-btn">Download Excel</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                        <div class="table-responsive" style="width: 100%;">
                            <table class="table table-hover my-0" id="data-table">
                                <thead style="background-color: #e6595f; color:white;">
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color:white;">
                                    @foreach ($items1 as $notCheck)
                                    <tr>
                                        <td>{{ $notCheck['id'] }}</td>
                                        <td>
                                            <b>{{ $notCheck['name'] }}</b> <br> {{ $notCheck['email'] }}
                                        </td>
                                        <td>{{ $notCheck['phone'] }}</td>
                                        <td>{{ $notCheck['date'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="check" role="tabpanel" aria-labelledby="check-in">
                <div class="row">
                    <div class="col-6 col-lg-6 col-xxl-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search2" placeholder="Search Data..">
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-xxl-6 text-end">
                        {{-- <button type="button" class="btn btn-success ml-auto" id="download-btn">Download Excel</button> --}}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                        <div class="table-responsive" style="width: 100%;">
                            <table class="table table-hover my-0" id="data-table">
                                <thead style="background-color: #e6595f; color:white;">
                                    <tr>
                                        <th>ID Order</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Ticket</th>
                                        <th>Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color:white;">
                                    @foreach ($items2 as $checkIn)
                                    <tr>
                                        <td>{{ $checkIn['id'] }}</td>
                                        <td>
                                            <b>{{ $checkIn['name'] }}</b> <br> {{ $checkIn['email'] }}
                                        </td>
                                        <td>{{ $checkIn['phone'] }}</td>
                                        <td>{{ $checkIn['name_ticket'] }}</td>
                                        <td>{{ $checkIn['date'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: right;">
                {{-- {!! $items->links() !!} --}}
            </div>
        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
    $(document).ready(function () {
        $("#search1").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function () {
        $("#search2").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("table tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script>
    function downloadExcel() {
    const table = document.getElementById("data-table");
    const rows = table.querySelectorAll("tr");

    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.table_to_sheet(table);

    const range = XLSX.utils.decode_range(ws['!ref']);
    for (let R = range.s.r; R <= range.e.r; ++R) {
        for (let C = range.s.c; C <= range.e.c; ++C) {
        const cellAddress = { c: C, r: R };
        const cellRef = XLSX.utils.encode_cell(cellAddress);
        if (ws[cellRef] && ws[cellRef].t === 'n') {
            ws[cellRef].t = 's'; // Change the cell type to 's' (string/text)
        }
        }
    }

    XLSX.utils.book_append_sheet(wb, ws, "Data");
    const wbout = XLSX.write(wb, { bookType: "xlsx", type: "array" });

    const blob = new Blob([wbout], { type: "application/octet-stream" });

    const downloadLink = document.createElement("a");
    downloadLink.href = URL.createObjectURL(blob);
    downloadLink.download = "data.xlsx";
    downloadLink.click();
    }

    document.getElementById("download-btn").addEventListener("click", downloadExcel);
</script>
@endsection
