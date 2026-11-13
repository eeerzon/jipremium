@extends('layout.layout_admin')
@section('brand', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('category.index') }}" class="btn btn-lg btn-success" style="margin-bottom: 20px;"><i data-feather="arrow-left"></i> Back</a>
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
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <label for="category_name">category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
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
