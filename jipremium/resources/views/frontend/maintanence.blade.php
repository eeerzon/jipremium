@extends('layout.layout_front_new')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12" style="margin-top: 90px; margin-bottom: 150px;">
            <div class="card text-center">
                <img src="/images/maintenance.png" class="card-img-top" style="display: block; margin-left: auto; margin-right: auto; width: 25%;">
                <div class="card-body">
                    @if(app()->getLocale() == 'en')
                        <h5 class="card-title" style="font-size: 2.5rem;">We'll Be Right Back</h5>
                        <p style="font-size: 1.1rem; color: #555;">
                            Our system is currently undergoing scheduled maintenance to improve your experience.
                        </p>
                        <p style="font-size: 1rem; color: #777;">
                            Please check back again shortly. We apologize for the inconvenience.
                        </p>
                    @else
                        <h5 class="card-title" style="font-size: 2.5rem;">Sedang Dalam Perbaikan</h5>
                        <p style="font-size: 1.1rem; color: #555;">
                            Sistem kami sedang dalam proses pemeliharaan untuk meningkatkan layanan.
                        </p>
                        <p style="font-size: 1rem; color: #777;">
                            Silahkan cek kembali beberapa saat lagi. Mohon maaf atas ketidaknyamanannya.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection