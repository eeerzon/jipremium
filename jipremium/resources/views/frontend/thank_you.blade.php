@extends('layout.layout_front_new')
@section('content')
 
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12" style="margin-top: 90px; margin-bottom: 150px;">
            <div class="card text-center">
                <img src="/images/checklist.png" class="card-img-top" style="display: block;margin-left: auto;margin-right: auto;width: 15%;">
                <div class="card-body">
                    @foreach ($orderDetails->reverse() as $index => $orderDetail)

                    @php
                        $firstOrderDetail = $orderDetails->first();
                    @endphp

                    <h5 class="card-title" style="font-size: 2.5rem;">{{ $firstOrderDetail->type }}</h5>

                    @php
                        $ticketNumber = count($orderDetails) - $index;
                    @endphp

                    <div class="card" style="margin-top: 10px; margin-bottom: 30px;">
                        <div class="card-header" style="background-color: #e6595f; color: white;">
                            @if(app()->getLocale() == 'en')
                                <h4>Ticket  #{{ $ticketNumber }}</h4>
                            @else
                                <h4>Tiket  #{{ $ticketNumber }}</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <b style="color: black; font-size: 14px;">{{ $orderDetail->email }}</b><br>
                                        <b style="color: black; font-size: 14px;">{{ $orderDetail->first_name }} {{ $orderDetail->last_name }}</b>
                                        <p>{{ $orderDetail->phone }}</p>
                                    </div>
                                    <div class="col-6">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data={{ $orderDetail->id }}" alt="">
                                        <h5>{{ $orderDetail->id }}</h5> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    @if(app()->getLocale() == 'en')
                        <h5 style="font-size: 1.5rem;">Please Check Your Email For Ticket Details</h5>
                    @else
                        <h5 style="font-size: 1.5rem;">Silahkan Cek Email Terdaftar Untuk Melihat Detail Tiket</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
