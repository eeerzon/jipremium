@extends('layout.layout_front_new')
@section('content')

    <style>

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .close:hover {
            color: red;
        }

        @media (max-width: 768px) {
            .modal-content {
                max-width: 90%;
            }
        }

    </style>

    <div class="site-section text-left bg-image rounded-3" style="background-color:rgb(222, 222, 222); padding: 1rem!important;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <!-- title desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left;">
                            <!-- <hr style="border-top: 1px solid black; width: 340px;"> -->
                            <h4 style="font-size: 2.4rem">{{ __('welcome.exhibitor_item') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row d-block d-lg-none">
                    <div class="col-sm-12">
                        <div class="text-black" style="text-align: left;">
                            <!-- <hr style="border-top: 1px solid black; width: 340px;"> -->
                            <h4 style="font-size: 1rem; text-align:left; font-weight: 600;">{{ __('welcome.exhibitor_item') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="container">
                <!-- desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="row">
                        @foreach($bestProducts->take(8) as $best)
                            <div class="col-md-3 col-sm-5 mb-3">
                                <div class="product-container" style="border: 1px solid #f5f5f5 !important; padding: 10px; background-color: white;">

                                    <p class="card-text category" data-category-id="{{ $best->category_id }}" hidden>
                                        {{ $best->brand->brand_name }}
                                    </p>

                                    <div class="card" style="border: none !important;">
                                        <a href="{{ route('brand.product', $best->id) }}">
                                            <img class="card-img-top" src="{{ $best->product_image }}" alt="Card image cap"
                                                style="max-width: 100%; max-height: 200px; object-fit: contain;">
                                        </a>
                                    </div>

                                    <div class="product-details">
                                        <div class="row" style="display: flex; flex-direction: column;">
                                            <div style="padding: 5px 15px;">
                                                <h4 class="card-text" style="font-size: 1rem; font-weight: 700; text-align: left; margin: 0;">
                                                    {{ $best->brand->brand_name }}
                                                </h4>
                                            </div>
                                            <div style="padding: 5px 15px;">
                                                <p class="card-text" style="text-align: left; font-weight: 300; color: #e6595f; margin: 0;">
                                                    {{ $best->brand->booth_no }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Button More Products -->
                        <div class="col-12 text-center mt-4">
                            <a href="{{ url('/brands') }}" class="btn btn-primary" style="background-color: #e6595f; border: none; width: 250px;">
                                {{ __('welcome.more_product') }}
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- mobile -->
                <div class="row d-block d-lg-none">
                    <div class="row">
                        @foreach($bestProducts->take(6) as $best)
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="product-container">
                                    <div class="product-details">
                                        <div class="row">
                                            <div class="col-8">
                                                <h4 class="card-text" style="font-size: 1rem; font-weight: 700; text-align: left; margin: 0;">
                                                    {{ $best->brand->brand_name }}
                                                </h4>
                                            </div>
                                            <div class="col-4">
                                                <p class="card-text" style="text-align: right; font-weight: 300; color: black; margin: 0;">
                                                    {{ $best->brand->booth_no }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="card-text category" data-category-id="{{ $best->category_id }}" hidden>
                                        {{ $best->brand->brand_name }}
                                    </p>

                                    <div class="card">
                                        <a href="{{ route('brand.product', $best->id) }}">
                                            <img class="card-img-top" src="{{ $best->product_image }}" alt="Card image cap"
                                                style="max-width: 100%; max-height: 200px; object-fit: contain;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Button More Products -->
                        <div class="col-12 text-center mt-4">
                            <a href="{{ url('/brands') }}" class="btn btn-primary" style="background-color: #e6595f; border: none; width: 250px;">
                                {{ __('welcome.more_product') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection