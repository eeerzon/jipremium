@extends('layout.layout_admin')
@section('notice', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('notice.index') }}" class="btn btn-lg btn-success" style="margin-bottom: 20px;"><i data-feather="arrow-left"></i> Back</a>
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
            <form action="{{ route('notice.update',$notice->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Input Data</h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-0">Title</h5>
                            <input type="text" class="form-control" name="title" value="{{ $notice->title }}">
                            <br>

                            <h5 class="card-title mb-0">Date</h5>
                            <input type="date" class="form-control" name="date" value="{{ $notice->date }}">
                            <br>

                            <h5 class="card-title mb-0">Description</h5>
                            <textarea class="form-control" rows="2" id="desc" name="description"  style="height: 158px;">{{ $notice->description }}</textarea>
                            <br>

                            <h5 class="card-title mb-0">Asset</h5>
                            <img src="/public/image/{{ $notice->asset }}" width="50%" style="margin-bottom: 10px;">
                            <input type="file" class="form-control" name="asset" placeholder="asset">
                            <br>

                            <button type="submit" class="btn btn-lg btn-primary">Submit <i data-feather="chevrons-right"></i></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('desc');
</script>
@endsection
