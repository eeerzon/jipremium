@extends('layout.layout_admin')
@section('brand', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('brand.index') }}" class="btn btn-lg btn-success" style="margin-bottom: 20px;"><i data-feather="arrow-left"></i> Back</a>
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
            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                            <br>
                            <label for="brand_desc">Brand Description</label>
                            <textarea class="form-control ckeditor" id="brand_desc" name="brand_desc"></textarea>
                            <br>
                            <label for="booth_no">Booth Number</label>
                            <input type="text" class="form-control" id="booth_no" name="booth_no">
                            <br>
                            <label for="ceo_name">CEO Name</label>
                            <input type="text" class="form-control" id="ceo_name" name="ceo_name">
                            <br>
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website" name="website">
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
    CKEDITOR.replace('brand_desc');
</script>
@endsection
