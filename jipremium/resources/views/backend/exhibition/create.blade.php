@extends('layout.layout_admin')
@section('dashboard', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
    <a href="{{ route('exhibition.index') }}" class="btn btn-lg btn-success" style="margin-bottom: 20px;"><i data-feather="arrow-left"></i> Back</a>
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
            <form action="{{ route('exhibition.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Input Image</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-0">Title</h5>
                            <input type="file" name="image" class="form-control" placeholder="">
                            <br>
                            <h5 class="card-title mb-0">Title</h5>
                            <input type="text" class="form-control" name="title" placeholder="title" required>
                            <br>
                            <h5 class="card-title mb-0">Description</h5>
                            <input type="text" class="form-control" name="description" placeholder="description" required>
                            <br>
                            <h5 class="card-title mb-0">Hyperlink</h5>
                            <input type="text" class="form-control" name="hyperlink" placeholder="link" required>
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
