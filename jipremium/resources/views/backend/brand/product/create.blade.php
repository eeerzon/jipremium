@extends('layout.layout_admin')
@section('brand', 'active')
@section('content')

<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('product.index') }}" class="btn btn-lg btn-success" style="margin-bottom: 20px;"><i data-feather="arrow-left"></i> Back</a>
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
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                            <br>

                            <label for="product_image">Product Image</label>
                            <input type="url" class="form-control" id="product_image" name="product_image" required>
                            <br>

                            <label for="product_desc">Product Description</label>
                            <textarea class="form-control ckeditor" id="product_desc" name="product_desc" required></textarea>
                            <br>

                            <label for="brand_id">Brand</label>
                            <select class="form-control" id="brand_id" name="brand_id">
                                @foreach ($brand as $brands)
                                    <option value="{{ $brands->id }}">{{ $brands->brand_name }}</option>
                                @endforeach
                            </select>
                            <br>

                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($category as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->category_name }}</option>
                                @endforeach
                            </select>
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
    CKEDITOR.replace('product_desc');
</script>
@endsection
