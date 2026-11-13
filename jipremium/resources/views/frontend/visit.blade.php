@extends('layout.layout_front_new')
@section('content')
    <!-- start section 1 desktop -->
        <div class="container d-none d-lg-block">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="images/visit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
                </div>
            </div>
        </div>
    <!-- end section 1 -->

    <!-- start section 1 mobile -->
        <div class="d-block d-lg-none">
            <img src="images/visit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
        </div>
    <!-- end section 1 -->

    <!-- start section 2 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">{{ __('visit.registration') }}</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('visit.dates') }}</h4>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('event_info.event_date') }}</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('visit.venue') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">JICC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">{{ __('visit.operation_hours') }}</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">[03 - 05 September] 10am – 6pm <br> [06 September] 10am – 5pm <br> {{ __('visit.last_admission') }}</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">{{ __('visit.online_pre_registration') }}</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">{{ __('visit.online_registration_desc') }}</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">{{ __('visit.onsite_registration') }}</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">{{ __('visit.onsite_registration_desc') }}</h4><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section text-left bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row d-none d-lg-block">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">{{ __('visit.online_regis_title') }}</h4>
                                <h5 style="font-size: 1.3rem">{{ __('visit.online_registration_desc') }}</h5>
                            </div>
                        </div>
                    </div>

                    <!-- matikan button berdasarkan req waktu -->
					@php
    					use Carbon\Carbon;
    					$now = Carbon::now('Asia/Jakarta');
    					// $deadline = Carbon::create(2026, 12, 2, 00, 00, 01, 'Asia/Jakarta');
    					$deadline = \App\Support\JipremiumEvent::onlineRegistrationDeadline();
    					$closed = $now->greaterThan($deadline);
					@endphp
					<hr style="border-top: 1px solid black">

					{{-- <a href="{{ $closed ? '#' : route('visitor_online.create') }}" --}}
					<a href="{{ $closed ? '#' : \App\Support\JipremiumEvent::registrationUrl(\App\Support\JipremiumEvent::DESKTOP_VISITOR_ONLINE_LINK) }}" @if(!$closed && \App\Support\JipremiumEvent::isExternalLink(\App\Support\JipremiumEvent::DESKTOP_VISITOR_ONLINE_LINK)) target="_blank" rel="noopener" @endif
   						class="btn btn-dark {{ $closed ? 'disabled' : '' }}"
   						style="width: 260px; {{ $closed ? 'pointer-events: none; opacity: 0.6;' : '' }}"
   						@if($closed) aria-disabled="true" tabindex="-1" @endif>
    						{{ __('visit.visitor_registration') }}
					</a>

					{{-- <a href="{{ $closed ? '#' : route('buyer_online.create') }}" --}}
					<a href="{{ $closed ? '#' : \App\Support\JipremiumEvent::registrationUrl(\App\Support\JipremiumEvent::DESKTOP_BUYER_ONLINE_LINK) }}" @if(!$closed && \App\Support\JipremiumEvent::isExternalLink(\App\Support\JipremiumEvent::DESKTOP_BUYER_ONLINE_LINK)) target="_blank" rel="noopener" @endif
   						class="btn btn-dark {{ $closed ? 'disabled' : '' }}"
   						style="width: 260px; {{ $closed ? 'pointer-events: none; opacity: 0.6;' : '' }}"
   						@if($closed) aria-disabled="true" tabindex="-1" @endif>
    						{{ __('visit.buyer_registration') }}
					</a>

					@if($closed)
    					@if(app()->getLocale() == 'en')
        					<p style="color:red; font-weight:bold; margin-top:10px;">
            					{{-- Online registration closed after 03 Sept 2026 23:59 --}}
            					Online registration closed after {{ $deadline->format('d M Y H:i') }}
        					</p>
    					@else
        					<p style="color:red; font-weight:bold; margin-top:10px;">
            					{{-- Registrasi Online di tutup setelah tanggal 03 Sept 2026 23:59 --}}
            					Registrasi Online di tutup setelah tanggal {{ $deadline->copy()->locale('id')->translatedFormat('d M Y H:i') }}
        					</p>
    					@endif
					@endif
                </div>
            </div>
        </div>

        <div class="site-section p-5 text-left bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row d-none d-lg-block">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">{{ __('visit.onsite_regis_title') }}</h4>
                                <h5 style="font-size: 1.3rem">{{ __('visit.onsite_registration_desc') }}</h5>
                            </div>
                        </div>
                    </div>

                    @php
                        // $open_onsite  = Carbon::create(2026, 9, 3, 0, 0, 0, 'Asia/Jakarta'); //(2025, 9, 11, 0, 0, 0, 'Asia/Jakarta')
                        $open_onsite  = \App\Support\JipremiumEvent::onsiteRegistrationOpen();
                        // $close_onsite = Carbon::create(2026, 12, 6, 23, 0, 0, 'Asia/Jakarta');
                        $close_onsite = \App\Support\JipremiumEvent::onsiteRegistrationClose();
                        $isOpen = $now->between($open_onsite, $close_onsite);
                    @endphp

                    <hr style="border-top: 1px solid black">

                    @if($isOpen)
                        {{-- Onsite section: these buttons pointed to the ONLINE routes by mistake --}}
                        {{-- <a href="{{ route('visitor_online.create') }}" class="btn btn-dark" style="width: 260px;"> --}}
                        {{-- <a href="{{ route('visitor_onsite.create') }}" class="btn btn-dark" style="width: 260px;"> --}}
                        <a href="{{ \App\Support\JipremiumEvent::registrationUrl(\App\Support\JipremiumEvent::DESKTOP_VISITOR_ONSITE_LINK) }}" @if(\App\Support\JipremiumEvent::isExternalLink(\App\Support\JipremiumEvent::DESKTOP_VISITOR_ONSITE_LINK)) target="_blank" rel="noopener" @endif class="btn btn-dark" style="width: 260px;">
                            {{ __('visit.visitor_registration') }}
                        </a>

						<!-- <a href="https://kreenconnect.com/id/ticket-event/visitor-registration--jipremium-2026" class="btn btn-dark" style="width: 260px;">
    {{ __('visit.visitor_registration') }}
</a> -->

                        {{-- <a href="{{ route('buyer_online.create') }}" class="btn btn-dark" style="width: 260px;"> --}}
                        {{-- <a href="{{ route('buyer_onsite.create') }}" class="btn btn-dark" style="width: 260px;"> --}}
                        <a href="{{ \App\Support\JipremiumEvent::registrationUrl(\App\Support\JipremiumEvent::DESKTOP_BUYER_ONSITE_LINK) }}" @if(\App\Support\JipremiumEvent::isExternalLink(\App\Support\JipremiumEvent::DESKTOP_BUYER_ONSITE_LINK)) target="_blank" rel="noopener" @endif class="btn btn-dark" style="width: 260px;">
                            {{ __('visit.buyer_registration') }}
                        </a>

                        <!-- <a href="https://kreenconnect.com/id/ticket-event/buyer-registration--jipremium-2026" class="btn btn-dark" style="width: 260px;">
    {{ __('visit.buyer_registration') }}
</a> -->

                        <!-- <a href="https://kreenconnect.com/ticket-event/visitor-registration--jipremium-2026" 
                            class="btn btn-dark" style="width: 260px;" target="_blank">
                            {{ __('visit.visitor_registration') }}
                        </a>

                        <a href="https://kreenconnect.com/ticket-event/buyer-registration--jipremium-2026" 
                            class="btn btn-dark" style="width: 260px;" target="_blank">
                            {{ __('visit.buyer_registration') }}
                        </a> -->

                    @else
                        <a href="#" onclick="alertVisitorOnsite()" class="btn btn-dark" style="width: 260px;">
                            {{ __('visit.visitor_registration') }}
                        </a>
                        <a href="#" onclick="alertBuyerOnsite()" class="btn btn-dark" style="width: 260px;">
                            {{ __('visit.buyer_registration') }}
                        </a>

                        @if(app()->getLocale() == 'en')
                            <p style="color:red; font-weight:bold; margin-top:10px;">
                                {{-- On-site registration open on 03 Sept 2026 00:00 until 06 Sept 2026 23:00 --}}
                                On-site registration open on {{ $open_onsite->format('d M Y H:i') }} until {{ $close_onsite->format('d M Y H:i') }}
                            </p>

                            <script>
                                function alertVisitorOnsite() {
                                    {{-- alert("On-site registration will be open from Sept 3, 00:00 until Sept 6, 23:00 (WIB)."); --}}
                                    alert("On-site registration will be open from {{ $open_onsite->format('M j, H:i') }} until {{ $close_onsite->format('M j, H:i') }} (WIB).");
                                }
                                function alertBuyerOnsite() {
                                    {{-- alert("On-site registration will be open from Sept 3, 00:00 until Sept 6, 23:00 (WIB)."); --}}
                                    alert("On-site registration will be open from {{ $open_onsite->format('M j, H:i') }} until {{ $close_onsite->format('M j, H:i') }} (WIB).");
                                }
                            </script>
                        @else

                            <p style="color:red; font-weight:bold; margin-top:10px;">
                                {{-- Registrasi On-site di buka pada tanggal 03 Sept 2026 00:00 sampai tanggal 06 Sept 2026 23:00 --}}
                                Registrasi On-site di buka pada tanggal {{ $open_onsite->copy()->locale('id')->translatedFormat('d M Y H:i') }} sampai tanggal {{ $close_onsite->copy()->locale('id')->translatedFormat('d M Y H:i') }}
                            </p>

                            <script>
                                function alertVisitorOnsite() {
                                    {{-- alert("Pendaftaran Pengunjung dibuka pada 3 Sept 00.00 sampai 6 Sept 23.00 (WIB)."); --}}
                                    alert("Pendaftaran Pengunjung dibuka pada {{ $open_onsite->copy()->locale('id')->translatedFormat('j M H.i') }} sampai {{ $close_onsite->copy()->locale('id')->translatedFormat('j M H.i') }} (WIB).");
                                }
                                function alertBuyerOnsite() {
                                    {{-- alert("Pendaftaran Pembeli dibuka pada 3 Sept 00.00 sampai 16 Sept 23.00 (WIB)."); --}}
                                    alert("Pendaftaran Pembeli dibuka pada {{ $open_onsite->copy()->locale('id')->translatedFormat('j M H.i') }} sampai {{ $close_onsite->copy()->locale('id')->translatedFormat('j M H.i') }} (WIB).");
                                }
                            </script>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    <!-- end section 2 desktop -->

    <!-- start section 2 mobile -->
        <div class="site-section text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white; padding: 0rem;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left; margin-top: 50px;">
                                <h4 style="font-size: 1.2rem; font-weight: 900;">{{ __('visit.registration') }}</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">{{ __('visit.dates') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">{{ __('event_info.event_date') }}</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">{{ __('visit.venue') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">JICC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1rem; font-weight: 900;">{{ __('visit.operation_hours') }}</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 0.67rem">[03 - 05 September] 10am – 6pm <br> [06 September] 10am – 5pm <br> {{ __('visit.last_admission') }}</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1rem; font-weight: 900;">{{ __('visit.online_pre_registration') }}</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 0.67rem">{{ __('visit.online_registration_desc') }}</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1rem; font-weight: 900;">{{ __('visit.onsite_registration') }}</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 0.67rem">{{ __('visit.onsite_registration_desc') }}</h4><br>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>

        <div class="text-left bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">{{ __('visit.online_regis_title') }}</h4>
                                <h5 style="font-size: 0.6rem">{{ __('visit.online_regis_desc') }}</h5>
                            </div>
                        </div>
                    </div>
                    <!-- <hr style="border-top: 1px solid black">
                    <a href="{{ route('visitor_online.create') }}" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">{{ __('visit.visitor_registration') }}</a>
                    <a href="{{ route('buyer_online.create') }}" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">{{ __('visit.buyer_registration') }}</a> -->

                    {{-- <a href="{{ $closed ? '#' : route('visitor_online.create') }}" --}}
                    <a href="{{ $closed ? '#' : \App\Support\JipremiumEvent::registrationUrl(\App\Support\JipremiumEvent::MOBILE_VISITOR_ONLINE_LINK) }}" @if(!$closed && \App\Support\JipremiumEvent::isExternalLink(\App\Support\JipremiumEvent::MOBILE_VISITOR_ONLINE_LINK)) target="_blank" rel="noopener" @endif
                        class="btn btn-dark"
                        style="width: 260px; margin-bottom: 5px;"
                        @if($closed) disabled @endif>
                            {{ __('visit.visitor_registration') }}
                    </a>

                    {{-- <a href="{{ $closed ? '#' : route('buyer_online.create') }}" --}}
                    <a href="{{ $closed ? '#' : \App\Support\JipremiumEvent::registrationUrl(\App\Support\JipremiumEvent::MOBILE_BUYER_ONLINE_LINK) }}" @if(!$closed && \App\Support\JipremiumEvent::isExternalLink(\App\Support\JipremiumEvent::MOBILE_BUYER_ONLINE_LINK)) target="_blank" rel="noopener" @endif
                        class="btn btn-dark"
                        style="width: 260px;"
                        @if($closed) disabled @endif>
                            {{ __('visit.buyer_registration') }}
                    </a>

                    <!-- <a href="{{ $closed ? '#' : 'https://kreenconnect.com/ticket-event/visitor-registration--jipremium-2026' }}"
                        class="btn btn-dark"
                        style="width: 260px; margin-bottom: 5px;"
                        @if($closed) disabled @endif
                        @unless($closed) target="_blank" @endunless>
                        {{ __('visit.visitor_registration') }}
                    </a>

                    <a href="{{ $closed ? '#' : 'https://kreenconnect.com/ticket-event/buyer-registration--jipremium-2026' }}"
                        class="btn btn-dark"
                        style="width: 260px;"
                        @if($closed) disabled @endif
                        @unless($closed) target="_blank" @endunless>
                        {{ __('visit.buyer_registration') }}
                    </a> -->


                    @if($closed)
                        @if(app()->getLocale() == 'en')
                            <p style="color:#e6595f; font-weight:bold; margin-top:10px;font-size: 0.6rem;">
                                {{-- Online registration closed after 03 Sept 2026 23:59 --}}
                                Online registration closed after {{ $deadline->format('d M Y H:i') }}
                            </p>

                        @else
                            <p style="color:#e6595f; font-weight:bold; margin-top:10px;font-size: 0.6rem;">
                                {{-- Registrasi Online di tutup setelah tanggal 03 Sept 2026 23:59 --}}
                                Registrasi Online di tutup setelah tanggal {{ $deadline->copy()->locale('id')->translatedFormat('d M Y H:i') }}
                            </p>

                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="text-left bg-image rounded-3 d-block d-lg-none" style="background-color: white;  margin-bottom: 25px;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left; margin-top: 50px;">
                                <h4 style="font-size: 1.2rem">{{ __('visit.onsite_regis_title') }}</h4>
                                <h5 style="font-size: 0.6rem">{{ __('visit.onsite_regis_desc') }}</h5>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">

                    <!-- <a href="#" onclick="alertVisitor2()" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">{{ __('visit.visitor_registration') }}</a>
                    <a href="#" onclick="alertBuyer2()" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">{{ __('visit.buyer_registration') }}</a>
                    {{-- <a href="{{ route('visitor_onsite.create') }}" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">{{ __('visit.visitor_registration') }}</a>
                    <a href="{{ route('buyer_onsite.create') }}" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">{{ __('visit.buyer_registration') }}</a> --}}

                    @if(app()->getLocale() == 'en')
                        <script>
                            function alertVisitor2() {
                                alert("On-site registration will be open during the exhibition days");
                            }

                            function alertBuyer2() {
                                alert("On-site registration will be open during the exhibition days");
                            }
                        </script>
                    @else
                        <script>
                            function alertVisitor2() {
                                alert("Pendaftaran Pengunjung akan segera dibuka");
                            }

                            function alertBuyer2() {
                                alert("Pendaftaran Pembeli akan segera dibuka");
                            }
                        </script>
                    @endif -->

                    @if($isOpen)
                        <!-- <a href="https://kreenconnect.com/id/ticket-event/visitor-registration--jipremium-2026" class="btn btn-dark" style="width: 260px; margin-bottom: 5px;">
                            {{ __('visit.visitor_registration') }}
                        </a>
                        <a href="https://kreenconnect.com/id/ticket-event/buyer-registration--jipremium-2026" class="btn btn-dark" style="width: 260px;">
                            {{ __('visit.buyer_registration') }}
                        </a> -->

                        {{-- Mobile onsite buttons now use the same onsite routes as desktop --}}
                        {{-- <a href="https://kreenconnect.com/ticket-event/visitor-registration--jipremium-2026"
                            class="btn btn-dark" style="width: 260px;" target="_blank">
                            {{ __('visit.visitor_registration') }}
                        </a>

                        <a href="https://kreenconnect.com/ticket-event/buyer-registration--jipremium-2026"
                            class="btn btn-dark" style="width: 260px;" target="_blank">
                            {{ __('visit.buyer_registration') }}
                        </a> --}}

                        {{-- <a href="{{ route('visitor_onsite.create') }}" --}}
                        <a href="{{ \App\Support\JipremiumEvent::registrationUrl(\App\Support\JipremiumEvent::MOBILE_VISITOR_ONSITE_LINK) }}" @if(\App\Support\JipremiumEvent::isExternalLink(\App\Support\JipremiumEvent::MOBILE_VISITOR_ONSITE_LINK)) target="_blank" rel="noopener" @endif
                            class="btn btn-dark" style="width: 260px;">
                            {{ __('visit.visitor_registration') }}
                        </a>

                        {{-- <a href="{{ route('buyer_onsite.create') }}" --}}
                        <a href="{{ \App\Support\JipremiumEvent::registrationUrl(\App\Support\JipremiumEvent::MOBILE_BUYER_ONSITE_LINK) }}" @if(\App\Support\JipremiumEvent::isExternalLink(\App\Support\JipremiumEvent::MOBILE_BUYER_ONSITE_LINK)) target="_blank" rel="noopener" @endif
                            class="btn btn-dark" style="width: 260px;">
                            {{ __('visit.buyer_registration') }}
                        </a>

                    @else
                        <a href="#" onclick="alertVisitor2()" class="btn btn-dark" style="width: 260px; margin-bottom: 5px;">
                            {{ __('visit.visitor_registration') }}
                        </a>
                        <a href="#" onclick="alertBuyer2()" class="btn btn-dark" style="width: 260px;">
                            {{ __('visit.buyer_registration') }}
                        </a>

                        @if(app()->getLocale() == 'en')
                            <p style="color:#e6595f; font-weight:bold; margin-top:10px;font-size: 0.6rem;">
                                {{-- On-site registration open on 03 Sept 2026 00:00 until 06 Sept 2026 23:00 --}}
                                On-site registration open on {{ $open_onsite->format('d M Y H:i') }} until {{ $close_onsite->format('d M Y H:i') }}
                            </p>

                            <script>
                                function alertVisitor2() {
                                    alert("On-site registration will be open during the exhibition days");
                                }

                                function alertBuyer2() {
                                    alert("On-site registration will be open during the exhibition days");
                                }
                            </script>
                        @else

                            <p style="color:#e6595f; font-weight:bold; margin-top:10px;font-size: 0.6rem;">
                                {{-- Registrasi On-site di buka pada tanggal 03 Sept 2026 00:00 sampai tanggal 06 Sept 2026 23:00 --}}
                                Registrasi On-site di buka pada tanggal {{ $open_onsite->copy()->locale('id')->translatedFormat('d M Y H:i') }} sampai tanggal {{ $close_onsite->copy()->locale('id')->translatedFormat('d M Y H:i') }}
                            </p>

                            <script>
                                function alertVisitor2() {
                                    alert("Pendaftaran Pengunjung akan segera dibuka");
                                }

                                function alertBuyer2() {
                                    alert("Pendaftaran Pembeli akan segera dibuka");
                                }
                            </script>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    <!-- end section 2 mobile -->
@endsection