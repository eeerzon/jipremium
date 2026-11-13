@extends('layout.layout_front_new')
@section('content')

<style>
    p{
        color: black;
    }

	ul {
        padding: 1rem;
    }

    .text-black {
        color: black;
    }

    .font-gothic {
        font-family: "Century Gothic", CenturyGothic, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .bg-image {
        background-color: white;
    }

    @media (max-width: 768px) {
        .font-size-16 {
            font-size: 1.6rem;
        }

        .col-4, .col-8 {
            flex-basis: 100%;
            max-width: 100%;
        }

        .col-sm-12 {
            text-align: left;
        }
    }
</style>

<div class="text-center bg-image rounded-3">
    <div class="d-flex justify-content-left align-items-left h-100">
        <div class="container">
            <h4 class="font-size-16 text-left d-none d-lg-block" style="font-weight: 900; margin-top: 30px;">{{ $product->brand->brand_name }}</h4>
            <h4 class="font-size-16 text-left d-block d-lg-none" style="font-weight: 900; margin-top: 70px;">{{ $product->brand->brand_name }}</h4>

            <div class="row">
                <div class="col-md-6 col-sm-12" style="text-align: left;">
                    <h5><u>Booth No.</u> {{ $product->brand->booth_no }}</h5>
                </div>
                <!-- desktop -->
                <div class="col-md-6 col-sm-12 d-none d-lg-block" style="text-align: right;">
                    <h5><b>Category:</b> {{ $product->category->category_name }}</h5>
                    <h5><b>CEO name:</b> {{ $product->brand->ceo_name }}</h5>
                    @if ($product->brand->phone_number == 0)
                    @else
                        <h5><b>Phone Number:</b> {{ $product->brand->phone_number }}</h5>    
                    @endif
                    <h5><b>Email:</b> {{ $product->brand->email }}</h5>
                    
                    @if($product->brand->website)
                        @php
                            $raw = trim($product->brand->website);
                            $url = preg_match('/^https?:\/\//', $raw) ? $raw : 'http://' . $raw;
                        @endphp

                        <h5>
                            <b>Webpage:</b>
                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $raw }}</a>
                        </h5>
                    @endif

                </div>
                <!-- mobile -->
                <div class="col-md-6 col-sm-12 d-block d-lg-none" style="text-align: left; margin-top: 20px;">
                    <h5><b>Category:</b> {{ $product->category->category_name }}</h5><br>
                    <h5><b>CEO name:</b> {{ $product->brand->ceo_name }}</h5><br>
                    @if ($product->brand->phone_number == 0)
                    @else
                        <h5><b>Phone Number:</b> {{ $product->brand->phone_number }}</h5>    
                    @endif
                    <h5><b>Email:</b> {{ $product->brand->email }}</h5>
                    @if($product->brand->website)
                        @php
                            $raw = trim($product->brand->website);
                            $url = preg_match('/^https?:\/\//', $raw) ? $raw : 'http://' . $raw;
                        @endphp

                        <h5>
                            <b>Webpage:</b>
                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer">{{ $raw }}</a>
                        </h5>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-image rounded-3">
    <div class="d-flex justify-content-left align-items-left">
        <div class="container">
            <hr style="border-top: 2px solid black;">
            <div class="row">
                <div class="col-12 text-black font-gothic" style="color: black;">
                    {!! $product->brand->brand_desc !!}
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
@foreach($brandProducts as $brandProduct)
<div class="bg-image rounded-3" style="margin-bottom: 20px;">
    <div class="d-flex justify-content-left align-items-left">
        <div class="container">
            {{-- <h4 class="font-size-16 text-left" style="font-weight: 900;">{{ $product->product_name }}</h4> --}}
            <h4 class="font-size-16 text-left" style="font-weight: 900;">{!! $brandProduct->product_name !!}</h4>
            <div class="row">
                <div class="col-4 text-left text-black">
                    {{-- <img class="card-img-top" src="{{ asset('public/images/' . $brandProduct->product_image) }}" alt="{{ $brandProduct->product_name }}" style="max-width: 100%; max-height: 200px; object-fit: contain; margin-top: 20px;"> --}}
                    <img class="card-img-top" src="{{ $brandProduct->product_image }}" alt="{{ $brandProduct->product_name }}" style="max-width: 100%; max-height: 200px; object-fit: contain; margin-top: 20px;">
                </div>
                <div class="col-8 text-left text-black font-gothic" style="margin-top: 10px;">
                    {{-- {!! $product->product_desc !!} --}}
                    {!! $brandProduct->product_desc !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
