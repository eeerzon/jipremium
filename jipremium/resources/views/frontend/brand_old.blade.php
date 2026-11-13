@extends('layout.layout_front')
@section('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
    .product-container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .product-details {
        margin-bottom: 1.2rem !important;
    }
</style>

<div class="site-section p-5 text-center bg-image rounded-3" style="background-color: white;">
    <div class="d-flex justify-content-left align-items-left h-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="text-black d-none d-lg-block" style="text-align: left;">
                        <h4 style="font-size: 1.6rem; font-weight: 900;">2023 JIPREMIUM Brand</h4>
                    </div>
                    <div class="text-black d-block d-lg-none" style="text-align: left; margin-top: 10px;">
                        <h4 style="font-size: 1.4rem; font-weight: 900;">2023 JIPREMIUM Brand</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" id="search2">
                        <option value="">All Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="search1" placeholder="Brand">
                </div>
            </div>
            <hr style="border-top: 2px solid black; margin-bottom: 50px;">
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 col-sm-4 mb-4">
                    <div class="product-container">
                        <div class="product-details">
                            <div class="row">
                                <div class="col-md-9 col-sm-4">
                                    <h4 class="card-text" style="font-size: 1rem; font-weight: 900; text-align: left; margin: 0;">{{ $product->brand->brand_name }}</h4>
                                </div>
                                <div class="col-md-3 col-sm-8">
                                    <p class="card-text" style="text-align: right; font-weight: 300; color: black; margin: 0;">{{ $product->brand->booth_no }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <p class="card-text category" data-category-id="{{ $product->category_id }}" hidden>{{ $product->brand->brand_name }}</p>
                        
                        <div class="card">
                            <a href="{{ route('brand.product', $product->id) }}">
                                {{-- <img class="card-img-top" src="{{ asset('public/images/' . $product->product_image) }}" alt="Card image cap" style="max-width: 100%; max-height: 200px; object-fit: contain;"> --}}
                                <img class="card-img-top" src="{{ $product->product_image }}" alt="Card image cap" style="max-width: 100%; max-height: 200px; object-fit: contain;">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#search1").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".card-text").filter(function () {
                $(this).closest(".col-md-4").toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        $("#search2").on("change", function () {
            var selectedCategory = $(this).val();
            $(".card-text.category").filter(function () {
                var productCategory = $(this).data("category-id");
                $(this).closest(".col-md-4").toggle(selectedCategory === "" || productCategory == selectedCategory);
            });
        });
    });
</script>
@endsection
