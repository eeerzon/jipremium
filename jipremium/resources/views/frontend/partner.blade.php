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


        @keyframes scroll-left {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); } /* karena konten diduplikat */
        }

        .scroll-left {
            will-change: transform;
        }

        .partner-scroll-container:hover .partner-scroll-content {
            animation-play-state: paused;
        }

    </style>


    <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <!-- title desktop -->
                <div class="row d-none d-lg-block">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('welcome.official_partner') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row d-block d-lg-none">
                    <div class="col-sm-12">
                        <div class="text-black" style="text-align: left; font-weight: 600;">
                            <h4 style="font-size: 1rem; font-weight: 600;">{{ __('welcome.official_partner') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="container">
                <!-- section desktop -->
                <div class="d-none d-lg-block">
                    @foreach ($partners as $partner)
                        @php
                            $logos = $partner->partnerAsset()->get();
                            $logoCount = $logos->count();
                            $isScrollable = $logoCount >= 5;
                        @endphp

                        <div class="text-black" style="text-align: center; margin-top: 28px;">
                            <h4 style="font-size: 1rem;">{{ $partner->name }}</h4>
                        </div> 

                        <div class="partner-scroll-container" style="overflow: hidden; width: 100%;">
                            <div style="text-align: center;">
                                <div class="partner-scroll-content {{ $isScrollable ? 'scroll-left' : '' }}" style="display: inline-block;white-space: nowrap; animation: {{ $isScrollable ? 'scroll-left 30s linear infinite' : 'none' }};">
                                    @foreach ($logos as $item)
                                        @php 
                                            $link = $item->img == '20240312024106.png' ? 'https://indonesia.rxhuabo.com.cn/en/index.html' : null;
                                        @endphp
                                        <span style="margin: 0 1rem;">
                                            @if ($link)
                                                <a href="{{ $link }}" target="_blank">
                                                    <!-- <img src="/public/image/{{ $item->img }}" style="height: 70px; vertical-align: middle;"> -->
                                                    <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 70px; vertical-align: middle;">
                                                </a>
                                            @else
                                                    <!-- <img src="/public/image/{{ $item->img }}" style="height: 70px; vertical-align: middle;"> -->
                                                <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 70px; vertical-align: middle;">
                                            @endif
                                        </span>
                                    @endforeach

                                    @if ($isScrollable)
                                        @foreach ($logos as $item)
                                            @php 
                                                $link = $item->img == '20240312024106.png'
                                                    ? 'https://indonesia.rxhuabo.com.cn/en/index.html'
                                                    : null;
                                            @endphp
                                            <span style="display: inline-block; margin: 0 1rem;">
                                                @if ($link)
                                                    <a href="{{ $link }}" target="_blank">
                                                        <!-- <img src="/public/image/{{ $item->img }}" style="height: 70px;"> -->
                                                        <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 70px;">
                                                    </a>
                                                @else
                                                    <!-- <img src="/public/image/{{ $item->img }}" style="height: 70px;"> -->
                                                        <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 70px;">
                                                @endif
                                            </span>
                                        @endforeach
                                    @endif
                                </div>    
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-block d-lg-none">
                    @foreach ($partners as $partner)
                        @php
                            $logos = $partner->partnerAsset()->get();
                            $logoCount = $logos->count();
                            $isScrollable = $logoCount >= 5;
                        @endphp

                        <div>
                            <!-- Nama partner -->
                            <div class="text-black" style="text-align: center; margin-top: 28px;">
                                <h4 style="font-size: 1rem;">{{ $partner->name }}</h4>
                            </div>

                            <!-- Scrollable logo -->
                            <div class="partner-scroll-container" style="overflow: hidden; width: 100%;">
                                <div style="text-align: center;">
                                    <div class="partner-scroll-content {{ $isScrollable ? 'scroll-left' : '' }}" style="
                                        display: inline-block;
                                        white-space: nowrap;
                                        animation: {{ $isScrollable ? 'scroll-left 30s linear infinite' : 'none' }};
                                    ">
                                        @foreach ($logos as $item)
                                            @php 
                                                $link = $item->img == '20240312024106.png'
                                                    ? 'https://indonesia.rxhuabo.com.cn/en/index.html'
                                                    : null;
                                            @endphp
                                            <span style="margin: 0 1rem;">
                                                @if ($link)
                                                    <a href="{{ $link }}" target="_blank">
                                                        <!-- <img src="/public/image/{{ $item->img }}" style="height: 40px; vertical-align: middle;"> -->
                                                        <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 40px; vertical-align: middle;">
                                                    </a>
                                                @else
                                                        <!-- <img src="/public/image/{{ $item->img }}" style="height: 40px; vertical-align: middle;"> -->
                                                    <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 40px; vertical-align: middle;">
                                                @endif
                                            </span>
                                        @endforeach

                                        <!-- Duplicate content for seamless scroll if more than 5 -->
                                        @if ($isScrollable)
                                            @foreach ($logos as $item)
                                                @php 
                                                    $link = $item->img == '20240312024106.png'
                                                        ? 'https://indonesia.rxhuabo.com.cn/en/index.html'
                                                        : null;
                                                @endphp
                                                <span style="display: inline-block; margin: 0 1rem;">
                                                    @if ($link)
                                                        <a href="{{ $link }}" target="_blank">
                                                            <!-- <img src="/public/image/{{ $item->img }}" style="height: 40px;"> -->
                                                            <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 40px;">
                                                        </a>
                                                    @else
                                                        <!-- <img src="/public/image/{{ $item->img }}" style="height: 40px;"> -->
                                                            <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 40px;">
                                                    @endif
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
      

    
@endsection
