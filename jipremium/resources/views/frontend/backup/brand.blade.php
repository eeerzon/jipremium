@extends('layout.layout_front_new')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

    .sticky-navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
        transition: all 0.3s ease;
    }

    .sticky-navbar:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 767px) {
    .sticky-navbar {
        padding: 2.7rem 0;
    }

    .sticky-navbar .row {
        flex-direction: column;
    }

    .sticky-navbar .col-md-4,
    .sticky-navbar .col-md-6,
    .sticky-navbar .col-md-2 {
        width: 100%;
        top: 3rem;
        margin-bottom: 10px;
    }

    .content {
        position: relative;
    }

    .product-container {
        padding: 10px;
    }

    @media (max-width: 767px) {
        .product-container {
            margin-bottom: 1rem;
        }
        .product-details {
            margin-bottom: 0.8rem !important;
        }
        .product-container .card-img-top {
            max-height: 150px;
        }
        .site-section h4 {
            font-size: 1.4rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .product-container .card-img-top {
            max-height: 180px;
        }
    }

    @media (min-width: 992px) {
        .product-container .card-img-top {
            max-height: 200px;
        }
    }

    .text-black h4 {
        font-size: 1.6rem;
        font-weight: bolder;
    }

    @media (max-width: 576px) {
        .text-black h4 {
            font-size: 1.2rem;
        }
    }

</style>

<div class="content">
    <nav class="sticky-navbar" id="stickyNavbar">
        <div class="container">
            <form action="{{ route('brands') }}" method="GET" id="searchForm">
                <div class="row align-items-center">
                    <!-- <div class="col-md-4 mb-3 mb-md-0"> -->
					<div class="col-md-0 mb-0 mb-md-0">
                        <!-- <select class="form-control" name="category" id="categorySelect">
                            <option value="all" @if(request()->input('category') == 'all') selected @endif>All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if(request()->input('category') == $category->id) selected @endif>{{ $category->category_name }}</option>
                            @endforeach
                        </select> -->
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        @if(app()->getLocale() == 'en')
                            <input type="text" class="form-control" name="search" id="searchInput" placeholder="Brand Name" value="{{ request()->input('search') }}">
                        @else
                            <input type="text" class="form-control" name="search" id="searchInput" placeholder="Nama Produk" value="{{ request()->input('search') }}">
                        @endif
                    </div>
                    <div class="col-md-2">
                        @if(app()->getLocale() == 'en')
                            <button type="submit" class="btn btn-danger w-100">Search <i class="fas fa-search"></i></button>
                        @else
                            <button type="submit" class="btn btn-danger w-100">Cari <i class="fas fa-search"></i></button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </nav>

    <div class="site-section p-5 text-center bg-image rounded-3" style="background-color: white;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        @if(app()->getLocale() == 'en')
                            <div class="text-black" style="text-align: left;">
                                <h4>Best Products Awards 1<sup>st</sup> - 3<sup>rd</sup></h4>
                            </div>
                        @else
                            <div class="text-black" style="text-align: left;">
                                <h4>Penghargaan Produk Terbaik</h4>
                            </div>
                        @endif
                    </div>
                </div>
                <hr style="border-top: 2px solid black; margin-bottom: 50px;">
                <div class="row">
                    @foreach($bestProducts as $best)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-container">
                                <div class="product-details">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="card-text" style="font-size: 1rem; font-weight: 700; text-align: left; margin: 0;">{{ $best->brand->brand_name }}</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="card-text" style="text-align: right; font-weight: 300; color: black; margin: 0;">{{ $best->brand->booth_no }}</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="card-text category" data-category-id="{{ $best->category_id }}" hidden>{{ $best->brand->brand_name }}</p>

                                <div class="card">
                                    <a href="{{ route('brand.product', $best->id) }}">
                                        <img class="card-img-top" src="{{ $best->product_image }}" alt="Card image cap" style="max-width: 100%; max-height: 200px; object-fit: contain;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="site-section p-5 text-center bg-image rounded-3" style="background-color: white;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        @if(app()->getLocale() == 'en')
                            <div class="text-black" style="text-align: left;">
                                <h4>Best Products Design </h4>
                            </div>
                        @else
                            <div class="text-black" style="text-align: left;">
                                <h4>Desain Produk Terbaik</h4>
                            </div>
                        @endif
                    </div>
                </div>
                <hr style="border-top: 2px solid black; margin-bottom: 50px;">
                <div class="row">
                    @foreach($bestDesigns as $best)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-container">
                                <div class="product-details">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="card-text" style="font-size: 1rem; font-weight: 700; text-align: left; margin: 0;">{{ $best->brand->brand_name }}</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="card-text" style="text-align: right; font-weight: 300; color: black; margin: 0;">{{ $best->brand->booth_no }}</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="card-text category" data-category-id="{{ $best->category_id }}" hidden>{{ $best->brand->brand_name }}</p>

                                <div class="card">
                                    <a href="{{ route('brand.product', $best->id) }}">
                                        <img class="card-img-top" src="{{ $best->product_image }}" alt="Card image cap" style="max-width: 100%; max-height: 200px; object-fit: contain;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="site-section p-5 text-center bg-image rounded-3" style="background-color: white;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        @if(app()->getLocale() == 'en')
                            <div class="text-black" style="text-align: left;">
                                <!-- <h4>JIPREMIUM Brands - 2025</h4> -->
								<h4>JIPREMIUM Brands - {{ date('Y') }}</h4>
                            </div>
                        @else
                            <div class="text-black" style="text-align: left;">
                                <!-- <h4>Produk - Produk JIPREMIUM - 2025</h4> -->
								<h4>Produk - Produk JIPREMIUM - {{ date('Y') }}</h4>
                            </div>
                        @endif
                    </div>
                </div>
                <hr style="border-top: 2px solid black; margin-bottom: 50px;">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-container">
                                <div class="product-details">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="card-text" style="font-size: 1rem; font-weight: 700; text-align: left; margin: 0;">{{ $product->brand->brand_name }}</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="card-text" style="text-align: right; font-weight: 300; color: black; margin: 0;">{{ $product->brand->booth_no }}</p>
                                        </div>
                                    </div>
                                </div>

                                <p class="card-text category" data-category-id="{{ $product->category_id }}" hidden>{{ $product->brand->brand_name }}</p>

                                <div class="card">
                                    <a href="{{ route('brand.product', $product->id) }}">
                                        <!-- <img class="card-img-top" src="https://wsrv.nl/?url={{ urlencode($product->product_image) }}&w=400&q=75&output=webp" alt="Card image cap" loading="lazy" width="300" height="200" style="max-width: 100%; max-height: 200px; object-fit: contain;"> -->
										
										<img class="card-img-top"
     										src="https://wsrv.nl/?url={{ urlencode($product->product_image) }}&w=400&q=75&output=webp"
     										srcset="https://wsrv.nl/?url={{ urlencode($product->product_image) }}&w=200&q=75&output=webp 200w,
             									https://wsrv.nl/?url={{ urlencode($product->product_image) }}&w=400&q=75&output=webp 400w"
     										sizes="(max-width: 600px) 200px, 400px"
     										alt="Card image cap"
     										loading="lazy"
     										style="max-width: 100%; max-height: 200px; object-fit: contain;">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row justify-content-center mt-4">
                    <div class="col-md-8 col-sm-12">
                        <div class="d-flex justify-content-center">
                            {{ $products->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('categorySelect');
        const searchForm = document.getElementById('searchForm');

        categorySelect.addEventListener('change', function() {
            searchForm.submit();
        });
    });
</script>
@endsection
