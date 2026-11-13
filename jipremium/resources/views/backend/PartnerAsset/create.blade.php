@extends('layout.layout_admin')
@section('dashboard', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('asset.index') }}" class="btn btn-lg btn-success" style="margin-bottom: 20px;"><i data-feather="arrow-left"></i> Back</a>
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Sorry</strong> Error Input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Input Data</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-0">Title</h5>
                            <select class="form-control" id="partners_id" name="partners_id">
                                @foreach ($partners as $items)
                                    <option value="{{ $items->id }}">{{ $items->name }}</option>
                                @endforeach
                            </select>
                            <br>

                            <h5 class="card-title mb-0">Image</h5>
                            <input type="file" class="form-control" name="img" placeholder="" required>
                            <br>
                            <button type="submit" class="btn btn-lg btn-primary">Submit <i data-feather="chevrons-right"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
