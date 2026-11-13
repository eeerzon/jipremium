@extends('layout.layout_front_id')
@section('content')
<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .modal.active {
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 1;
    }

    .modal-content {
        background-color: #fff;
        /* padding: 20px; */
        border-radius: 5px;
        position: relative;
        text-align: center;
        max-width: 25%;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }
    .popup-image {
        max-width: 100%;
        height: auto;
    }

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <div class="modal" id="myModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <a href="https://jipremium.com/visit">
                <img src="https://i.ibb.co/khzFmCB/a2e9d60a-7395-43e4-900f-b7e4708aaa30.jpg" style="width: 350px;" alt="popup-image" />
            </a>
        </div>
    </div> --}}
    <!-- start section 1 jumbotron desktop -->
        <div class="site-section p-5 text-left bg-image rounded-3 d-none d-lg-block" style="background-image: url('images/bg-jumbotron2.png');height:100%!important;">
            <div class="mask">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-white" style="text-align: left;">
                                    <h1 style="font-size: 5vmax; margin-top:-35px;">JAKARTA INTERNATIONAL PREMIUM PRODUCT FAIR</h1>
                                    <h5 style="font-size: 2vmax; font-weight:100; margin-top: 20px;">5 - 8 September 2024</h5>
                                    <h5 style="font-weight:100;font-size: 2vmax;">JCC, Jakarta, Indonesia</h5>
                                    <h5 style="font-size: 1.5vmax;font-style: italic; margin-top: 55px;">STYLISH LIFE DI JAKARTA</h5>
                                    <img style="margin-right: 4px; max-width: 6vmax;" src="images/Icon1.png" alt="">
                                    <img style="margin-right: 4px; max-width: 6vmax;" src="images/Icon2.png" alt="">
                                    <img style="margin-right: 4px; max-width: 6vmax;" src="images/Icon3.png" alt="">
                                    <img style="margin-right: 4px; max-width: 6vmax;" src="images/Icon4.png" alt="">
                                    <img style="margin-right: 4px; max-width: 6vmax;" src="images/Icon5.png" alt="">
                                    <img style="margin-right: 4px; max-width: 6vmax;" src="images/Icon6.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 1 jumbotron desktop -->

    <!-- start section 1 jumbotron mobile -->
        {{-- <div class="site-section text-left bg-image rounded-3 d-block d-lg-none" style="background-image: url('images/bg-jumbotron2.png');height:900px!important;"> --}}
        <div class="site-section text-left bg-image rounded-3 d-block d-lg-none" style="background-image: url('images/bg-jumbotron2.png');height:100%!important;padding: 1rem!important;">
            <div class="mask" style="margin-top: 30px;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="text-white" style="text-align: left;">
                                    <h1 style="font-size: 2.4rem; margin-top: 150px; font-weight: bolder;">JAKARTA INTERNATIONAL PREMIUM PRODUCT FAIR</h1>
                                    <h5 style="font-weight:500; margin-top: 30px; font-size: 1.2rem;">5 - 8 September 2024</h5>
                                    <h5 style="font-weight:500; font-size: 1.2rem;">JCC, Jakarta, Indonesia</h5>
                                    <h5 style="font-style: italic; margin-top: 80px; font-size: 1rem;">STYLISH LIFE DI JAKARTA</h5>
                                    <img style="max-width: 50px;" src="images/Icon1.png" alt="">
                                    <img style="max-width: 50px;" src="images/Icon2.png" alt="">
                                    <img style="max-width: 50px;" src="images/Icon3.png" alt="">
                                    <img style="max-width: 50px;" src="images/Icon4.png" alt="">
                                    <img style="max-width: 50px;" src="images/Icon5.png" alt="">
                                    <img style="max-width: 50px;" src="images/Icon6.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 1 jumbotron mobile -->


    <!-- start section 2 desktop -->
        <div class="site-section text-left bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">VIDEO EVENT SEBELUMNYA</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hgy3dDWNIA8" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 2 desktop -->

    <!-- start section 3 -->
        <div class="site-section text-left bg-image rounded-3" style="background-color: #e6595f; padding: 1rem!important;">
            <div class="d-flex justify-content-left align-items-left h-100" style="margin-top: 30px;">
                <div class="container">
                    <!-- title dekstop -->
                    <div class="row d-none d-lg-block">
                        <div class="col-8">
                            <div class="text-white" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">BERLANGGANAN DI BERITA KAMI</h4>
                            </div>
                        </div>
                    </div>

                    <!-- title mobile -->
                    <div class="row d-block d-lg-none">
                        <div class="col-12 col-sm-12">
                            <div class="text-white" style="text-align: left;">
                                <h4 style="font-size: 1rem;">BERLANGGANAN DI BERITA KAMI</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid white">
                </div>
            </div>

            <div class="d-flex justify-content-left align-items-left h-100" style="margin-bottom: 30px;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <h4 class="d-none d-lg-block" style="font-size: 1.4rem; color:white; font-weight: 100; text-align: left;">SIGNUP & BE THE FIRST TO GET THE LATEST NEWS</h4>

                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>

                            <form id="form" method="POST">
                                @csrf
                                <div class="form-row" style="text-align: left;">
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="name" style="color:white;">Nama</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter" required>
                                    </div>
                                    <br>
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="email" style="color:white;">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter" required>
                                    </div>
                                    <div class=" col-sm-4">
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-outline-light btn-md form-control" style="text-align:left; margin-top:8px; ">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- start section 2 mobile -->
        <div class="site-section text-left bg-image rounded-3 d-block d-lg-none" style="background-color: white; padding: 1rem!important; margin-top: 30px;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 600">VIDEO EVENT SEBELUMNYA</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hgy3dDWNIA8" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 2 mobile -->

    <!-- start section 4 desktop -->
        <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important; margin-top: 30px;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <!-- title desktop -->
                    <div class="row d-none d-lg-block">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">PARTNER RESMI JIPREMIUM</h4>
                            </div>
                        </div>
                    </div>

                    <!-- title mobile -->
                    <div class="row d-block d-lg-none">
                        <div class="col-sm-12">
                            <div class="text-black" style="text-align: left; font-weight: 600;">
                                <h4 style="font-size: 1rem; font-weight: 600;">PARTNER RESMI JIPREMIUM</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                </div>
            </div>
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <!-- section desktop -->
                    <div class="row">
                        @foreach ($partners as $partner)
                            <div class="col-sm-4 d-none d-lg-block">
                                <div class="text-black" style="text-align: left;margin-top: 28px;">
                                    <h4 style="font-size: 1.4rem">• {{ $partner->name }}</h4>
                                </div>
                            </div>
                            <div class="col-sm-8 d-none d-lg-block" style="text-align: left; margin-top: 20px;">
                                @foreach($partner->partnerAsset()->get() as $item)
                                    @if ($item->img == '20240312024106.png')
                                        <a href="https://indonesia.rxhuabo.com.cn/en/index.html" target="_blank">
                                            <img src="/public/image/{{ $item->img }}" style="max-width: 9%;">
                                        </a><br>
                                    @else
                                        <img src="/public/image/{{ $item->img }}" style="max-width: 9%;">
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
            
                    <!-- section mobile -->
                    <div class="row d-block d-lg-none">
                        @foreach ($partners as $partner)
                            <div class="col-sm-12">
                                <div class="text-black" style="text-align: left;margin-top: 40px;">
                                    <h4 style="font-size: 1rem; font-weight: 600;">{{ $partner->name }}</h4>
                                </div>
                            </div>
                            <div class="col-sm-12" style="text-align: left; margin-top: 15px;">
                                @foreach($partner->partnerAsset()->get() as $item)
                                    @if ($item->img == '20240312024106.png')
                                        <a href="https://indonesia.rxhuabo.com.cn/en/index.html" target="_blank">
                                            <img src="/public/image/{{ $item->img }}" style="max-width: 15%;">
                                        </a>
                                    @else
                                        <img src="/public/image/{{ $item->img }}" style="max-width: 15%;">
                                    @endif
                                @endforeach
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>            
        </div>
        <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important; margin-top: 30px;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <!-- title desktop -->
                    <div class="row d-none d-lg-block">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">PAMERAN KELUARGA</h4>
                            </div>
                        </div>
                    </div>

                    <!-- title mobile -->
                    <div class="row d-block d-lg-none">
                        <div class="col-sm-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; text-align:left; font-weight: 600;">PAMERAN KELUARGA</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                </div>
            </div>
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        @foreach ($exhibition as $data)
                        <div class="col-sm-6">
                            <div class="img-exhibition d-none d-lg-block" style="position: relative; margin-bottom: 10px;">
                                <img src="/public/image/{{ $data->image }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                <div class="bottom-left" style="text-align: left; width: 100%;position: absolute;bottom: 0;padding: 10px;left: 0; background-color: #e6595f8a;">
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <h5 style="margin-left: 20px; margin-right: 20px; color:white; font-style:bold; font-weight: 900;">{{ $data->title }}</h5>
                                    </a>
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <h5 style="margin-left: 20px; margin-right: 20px; color:white; font-weight: 900;">{{ $data->description }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach ($exhibition as $data)
                        <div class="col-sm-12">
                            <div class="img-exhibition d-block d-lg-none" style="position: relative; margin-bottom: 10px;">
                                <img src="/public/image/{{ $data->image }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                <div class="bottom-left" style="text-align: left; width: 100%;position: absolute;bottom: 0;padding: 10px;left: 0; background-color: #e6595f8a;">
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <b style=" color:white; font-style:bold; font-size: 14px; font-weight: 900;">{{ Str::limit($data->title, 40) }}</b>
                                    </a>
                                    <br>
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <b style=" color:white; font-size: 14px; font-weight: 900;">{{ Str::limit($data->description, 30) }}</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    
        <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important; margin-top: 30px;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <!-- title desktop -->
                    <div class="row d-none d-lg-block">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">PERTUNJUKAN SERENTAK</h4>
                            </div>
                        </div>
                    </div>

                    <!-- title mobile -->
                    <div class="row d-block d-lg-none">
                        <div class="col-sm-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; text-align:left; font-weight: 600;">PERTUNJUKAN SERENTAK</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                </div>
            </div>
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="img-exhibition d-none d-lg-block" style="position: relative; margin-bottom: 10px;">
                                <a href="{{ url('/mom-and-kids') }}">
                                    <img src="{{ asset('images/imkids_update_logo.png') }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="img-exhibition d-none d-lg-block" style="position: relative; margin-bottom: 10px;">
                                <a href="{{ url('/mom-and-kids') }}">
                                    <img src="{{ asset('images/artcontest.jpg') }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="img-exhibition d-block d-lg-none" style="position: relative; margin-bottom: 10px;">
                                <a href="{{ url('/mom-and-kids') }}">
                                    <img src="{{ asset('images/imkids_update_logo.png') }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="img-exhibition d-block d-lg-none" style="position: relative; margin-bottom: 10px;">
                                <a href="{{ url('/mom-and-kids') }}">
                                    <img src="{{ asset('images/artcontest.jpg') }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section 4 desktop -->

    {{-- function alert store news --}}
    <script>
        $(document).ready(function() {
            $('#form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('news.store') }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                $('.alert-success').html(response.message);
                $('.alert-success').fadeIn().delay(2000).fadeOut();
                },
                error: function(xhr) {
                alert('Error: ' + xhr.responseText);
                }
            });
            });
        });
    </script>

    <script>
        var modal = document.getElementById('myModal');
        var closeModal = document.getElementById('closeModal');

        function openModal() {
            modal.style.display = 'block';
            modal.style.position = 'fixed';
            modal.style.top = '50%';
            modal.style.left = '50%';
            modal.style.transform = 'translate(-50%, -50%)';
            setTimeout(function () {
                modal.classList.add('active');
            }, 50);
        }

        function closeModalFunc() {
            modal.classList.remove('active');
            setTimeout(function () {
                modal.style.display = 'none';
            }, 300); 
        }

        window.onload = function () {
            openModal();
        }

        closeModal.onclick = function () {
            closeModalFunc();
        }

        window.onclick = function (event) {
            if (event.target === modal) {
                closeModalFunc();
            }
        }
    </script>  
@endsection
