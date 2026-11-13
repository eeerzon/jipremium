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
            <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}">
                            <br>

                            <img src="{{ $product->product_image }}" width="100px" style="margin-bottom: 10px;"><br>
                            <label for="product_image">Product Image</label>
                            <input type="url" class="form-control" id="product_image" name="product_image" value="{{ $product->product_image }}">
                            <br>

                            <label for="product_desc">Product Description</label>
                            <textarea class="form-control ckeditor" id="product_desc" name="product_desc">{{ $product->product_desc }}</textarea>
                            <br>

                            <label for="brand_id">Brand</label>
                            <select class="form-control" id="brand_id" name="brand_id">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id === $product->brand_id ? 'selected' : '' }}>
                                        {{ $brand->brand_name }}
                                    </option>
                                @endforeach
                            </select>
                            <br>

                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
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
