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
            <form action="{{ route('exhibition.update',$exhibition->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Input Image</h5>
                        </div>
                        <div class="card-body">
                            <img src="/public/image/{{ $exhibition->image }}" width="50%" style="margin-bottom: 10px;">
                            <br>
                            <h5 class="card-title mb-0">Image</h5>
                            <input type="file" name="image" class="form-control" placeholder="image">
                            <br>
                            <h5 class="card-title mb-0">Title</h5>
                            <input type="text" class="form-control" name="title" value="{{ $exhibition->title }}">
                            <br>
                            <h5 class="card-title mb-0">Description</h5>
                            <input type="text" class="form-control" name="description" value="{{ $exhibition->description }}">
                            <br>
                            <h5 class="card-title mb-0">Hyperlink</h5>
                            <input type="text" class="form-control" name="hyperlink" value="{{ $exhibition->hyperlink }}">
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
