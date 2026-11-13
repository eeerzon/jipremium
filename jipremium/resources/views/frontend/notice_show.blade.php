@extends('layout.layout_front_new')
@section('content')

<style>
	p, li{
        color: black;
 		font-family: "Century Gothic", CenturyGothic, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
</style>

<div class="site-section p-5 text-center bg-image rounded-3" style="background-color: white;">
    <div class="d-flex justify-content-left align-items-left h-100">
        <div class="container">
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-12 d-none d-lg-block">
                    {{-- <img src="{{ $dataNotice->asset }}" alt="" style="max-width:100%; height: 200px;"> --}}
                    <img src="/public/image/{{ $dataNotice->asset }}" alt="Image" style="max-width: 100%; margin-bottom:10px; margin-top:40px; max-height: 500px;" class="img-fluid text-center">
                    <h1 style="font-size: 1.4rem;" class="text-center"><b>{!! \App\Support\HtmlSanitizer::clean($dataNotice->title) !!}</b></h1>
                    <h2 class="text-center">{!! \App\Support\HtmlSanitizer::clean($dataNotice->date) !!}</h2>
                    <hr style="border-top: 1px solid black">
                    <h2 class="text-left" style="font-size: 1.2rem;">{!! \App\Support\HtmlSanitizer::clean($dataNotice->description) !!}</h2>
                </div>
                <div class="col-12 d-block d-lg-none">
                    {{-- <img src="{{ $dataNotice->asset }}" alt="" style="max-width:100%; height: 200px;"> --}}
                    <img src="/public/image/{{ $dataNotice->asset }}" alt="Image" style="max-width: 100%; margin-bottom:10px; margin-top:40px; max-height: 500px;" class="img-fluid text-center">
                    <h1 style="font-size: 0.9rem;" class="text-center">{!! \App\Support\HtmlSanitizer::clean($dataNotice->title) !!}</h1>
                    <h2 style="font-size: 0.9rem;" class="text-center">{!! \App\Support\HtmlSanitizer::clean($dataNotice->date) !!}</h2>
                    <hr style="border-top: 1px solid black">
                    <h2 class="text-left" style="font-size: 0.7rem;">{!! \App\Support\HtmlSanitizer::clean($dataNotice->description) !!}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
