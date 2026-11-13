@extends('layout.layout_front_nofooter')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
    .card{
        box-shadow: 0 3px 8px rgba(0,0,0,0.16), 0 3px 8px rgba(0,0,0,0.23);
    }
</style>
<style>
    .loading-screen {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .loading-screen .content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .loading-spinner {
        border: 16px solid #f3f3f3;
        border-top: 16px solid #e6595f;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading-text {
        margin-top: 20px;
        font-size: 1.5rem;
        color: #e6595f;
    }
</style>

<div class="loading-screen" id="loading-screen">
    <div class="content">
        <div class="loading-spinner"></div>
        <div class="loading-text">Please Wait<br>Don't Close This Page</div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="text-black" style="text-align: left;">
            <h4 style="font-size: 2.4rem; margin-top: 65px;">Order Your Ticket</h4>
            </div>
        </div>
    </div>
    <hr style="border-top: 1px solid black">
    <h4 style="font-size: 1.4rem; margin-bottom: 30px;">Maximum Ticket: 5</h4>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">{{$error}}</div>
        @endforeach
    @endif

    <form action="{{ route('buyer_online.store') }}" id="my-form" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-8" id="dynamicTable">
                <div class="card" style="border-radius:15px;">
                    <div class="card-header" style="background-color: #e6595f; color: white; border-radius: 15px 15px 0px 0px;">
                        <h5><b>Ticket #1</b></h5>
                        <h5>Buyer: Online Pre-Registration</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <h5>First Name (Nama Awal) <b style="color: red;">*</b></h5>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your Name" class="form-control" required />
                                </div>
                                <div class="col-6 col-sm-6">
                                    <h5>Last Name (Nama Akhir) <b style="color: red;">*</b></h5>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your Name" class="form-control" required />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Email <b style="color: red;">*</b></h5>
                            <span style="color: red;">A registration confirmation and QR code will be sent to the
                                email you provided, so please make sure you have written
                                a valid email address.</span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <h5>Phone Number (Nomor Telp.) <b style="color: red;">*</b></h5>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" class="form-control" required />
                        </div>

                        <h5>Visit Day (Hari Kunjungan) <b style="color: red;">*</b></h5>
                        {{-- visit day checkbox --}}
                        <div class="form-group" id="visit_day">
                            <div class="form-check">
                                <input class="form-check-input" name="visit_day[]" type="checkbox" value="Day 1: 05 September 2024" id="day1">
                                <label class="form-check-label" for="day1">
                                    Day 1: 05 September 2024
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="visit_day[]" type="checkbox" value="Day 2: 06 September 2024" id="day2">
                                <label class="form-check-label" for="day2">
                                    Day 2: 06 September 2024
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="visit_day[]" type="checkbox" value="Day 3: 07 September 2024" id="day3">
                                <label class="form-check-label" for="day3">
                                    Day 3: 07 September 2024
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="visit_day[]" type="checkbox" value="Day 4: 08 September 2024" id="day4">
                                <label class="form-check-label" for="day4">
                                    Day 4: 08 September 2024
                                </label>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <h5>Country  (Negara) <b style="color: red;">*</b></h5>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country name" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <h5>Company Name (Nama Perusahaan) <b style="color: red;">*</b></h5>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter your company name" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <h5>Job Title (Nama Pekerjaan)</h5>
                            <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Enter your job title " class="form-control" />
                        </div>

                        <div class="form-group">
                            <h5>Company Website (Laman Perusahaan) </h5>
                            <input type="text" class="form-control" id="company_website" name="company_website" placeholder="Enter your company website" class="form-control"/>
                        </div>

                        <h5>Type of Business (Jenis Perusahaan)<b style="color: red;">*</b></h5>
                        <div class="form-check">
                            <input class="form-check-input" name="type_business[]" type="checkbox" value="Manufacturer (Pabrik)" id="manufacturer">
                            <label class="form-check-label" for="manufacturer">
                                Manufacturer (Pabrik)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type_business[]" type="checkbox" value="Exporter (Eksportir)" id="exportir">
                            <label class="form-check-label" for="exportir">
                                Exporter (Eksportir)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type_business[]" type="checkbox" value="Agent (Agen)" id="agent">
                            <label class="form-check-label" for="agent">
                                Agent (Agen)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type_business[]" type="checkbox" value="Wholesaler/Distributor (Grosir/Distributor)" id="wholesaler">
                            <label class="form-check-label" for="wholesaler">
                                Wholesaler/Distributor (Grosir/Distributor)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type_business[]" type="checkbox" value="Department Store/Chain Store (Departemen Store/Minimarketretailer">
                            <label class="form-check-label" for="store">
                                Department Store/Chain Store (Departemen Store/Minimarket)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type_business[]" type="checkbox" value="Independent Retailer (Pengecer)" id="retailer">
                            <label class="form-check-label" for="retailer">
                                Independent Retailer (Pengecer)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="type_business[]" type="checkbox" value="Other (Lain - lain)" id="other">
                            <label class="form-check-label" for="other">
                                Other (Lain - lain)
                            </label>
                        </div>

                        <br>
                        <h5>Purpose of Visit (Tujuan Kunjungan) <b style="color: red;">*</b></h5>
                        <div class="form-check">
                            <input class="form-check-input" name="purpose_visit[]" type="checkbox" value="Purchasing (Pembelian)" id="purchasing">
                            <label class="form-check-label" for="purchasing">
                                Purchasing (Pembelian)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="purpose_visit[]" type="checkbox" value="Looking for Suppliers (Mencari Pemasok)" id="looking_supplier">
                            <label class="form-check-label" for="looking_supplier">
                                Looking for Suppliers (Mencari Pemasok)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="purpose_visit[]" type="checkbox" value="Collecting Information (Mengumpulkan Informasi)" id="collect_info">
                            <label class="form-check-label" for="collect_info">
                                Collecting Information (Mengumpulkan Informasi)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="purpose_visit[]" type="checkbox" value="Exhibiting at next show (Melihat untuk pameran selanjutnya)" id="exhibiting">
                            <label class="form-check-label" for="exhibiting">
                                Exhibiting at next show (Melihat untuk pameran selanjutnya)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="purpose_visit[]" type="checkbox" value="Other (Lain - lain)" id="other">
                            <label class="form-check-label" for="other">
                                Other (Lain - lain)
                            </label>
                        </div>

                        <br>
                        <div class="form-group">
                            <h5>Gender (Jenis Kelamin) <b style="color: red;">*</b></h5>
                            <select class="form-select" id="gender" name="gender" aria-label="Default select example" required>
                                <option value="" disabled selected>please select</option>
                                <option value="Man (Laki-Laki)">Man (Laki-Laki)</option>
                                <option value="Woman (Perempuan)">Woman (Perempuan)</option>
                            </select>
                        </div>

                        <div class="form-group" id="products_interested">
                            <h5>Products Interested (Produk yang Tertarik) <b style="color: red;">*</b></h5>
                            <div class="form-check">
                                <input class="form-check-input" name="products_interested[]" type="checkbox" value="Mom and Kids (Ibu & Anak-Anak)" id="mom">
                                <label class="form-check-label" for="mom">
                                    Mom and Kids (Ibu & Anak-Anak)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="products_interested[]" type="checkbox" value="Beauty and Fashion (Kecantikan & Busana)" id="beauty">
                                <label class="form-check-label" for="beauty">
                                    Beauty and Fashion (Kecantikan & Busana)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="products_interested[]" type="checkbox" value="Food and Beverage (Makanan & Minuman)" id="food">
                                <label class="form-check-label" for="food">
                                    Food and Beverage (Makanan & Minuman)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="products_interested[]" type="checkbox" value="Home and Arts (Rumah & Kesenian)" id="home">
                                <label class="form-check-label" for="home">
                                    Home and Arts (Rumah & Kesenian)
                                </label>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <h5>Products Interested (Produk yang Tertarik) <b style="color: red;">*</b></h5>
                            <select class="form-select" id="products_interested" name="products_interested" aria-label="Default select example" required>
                                <option value="Mom and Kids (Ibu & Anak-Anak)">Mom and Kids (Ibu & Anak-Anak)</option>
                                <option selected value="Beauty and Fashion (Kecantikan & Busana)">Beauty and Fashion (Kecantikan & Busana)</option>
                                <option value="Food and Beverage (Makanan & Minuman)">Food and Beverage (Makanan & Minuman)</option>
                                <option value="Home and Arts (Rumah & Kesenian)">Home and Arts (Rumah & Kesenian)</option>
                            </select>
                        </div> --}}

                        <!-- <div class="form-group">
                            <h5>Visit Day (Hari Kunjungan) <b style="color: red;">*</b></h5>
                            <select class="form-select" id="visit_day" name="visit_day" aria-label="Default select example" required>
                                <option selected value="Day 1: 05 September 2024">Day 1: 05 September 2024</option>
                                <option value="Day 2: 06 September 2024">Day 2: 06 September 2024</option>
                                <option value="Day 3: 07 September 2024">Day 3: 07 September 2024</option>
                                <option value="Day 4: 08 September 2024">Day 4: 08 September 2024</option>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <h5>Registration Code (Kode Registrasi)</h5>
                            <input type="text" class="form-control" id="registration_code" name="registration_code" placeholder="Enter your Registration Code (Kode Registrasi) (optional)" class="form-control" />
                        </div>
                        <br>

                        {{-- <div id="modal"></div>
                        <button type="button" name="add" id="add" class="btn btn-success" onclick="countClicks()">Add More Ticket  <i class="fa-solid fa-plus"></i></button> --}}
                    </div>
                </div>
                <br>
            </div>
            <div class="col-sm-4">
                {{-- checkout desktop --}}
                <div class="card d-none d-lg-block" style="position: sticky; top: 1px; border-radius:15px; margin-bottom: 15px;">
                    <div class="card-header" style="background-color: #e6595f; color: white; border-radius: 15px 15px 0px 0px;">
                        <h5><b>Checkout</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <h5>Price</h5>
                            </div>
                            <div class="col-6 col-sm-6">
                                <h5 style="color: red;  font-weight: 1000;">Free</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <h5>Total Ticket </h5>
                            </div>
                            <div class="col-6 col-sm-6">
                                <h5 id="output" style="">1</h5>
                            </div>
                        </div>
                            <div id="modal"></div>
                            <button type="button" name="add" id="add" class="btn btn-md btn-success" style="color: white; width: 100%; margin-bottom: 10px; margin-top: 10px;">Add More Ticket  <i class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="accept" type="checkbox" checked disabled>
                                    <label class="form-check-label" style="opacompany_name: 2.5;">
                                        Continue & Accept Terms Conditions
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-md btn-dark" style="color: white; width: 100%; margin-bottom: 10px; margin-top: 10px;">Purchase Ticket <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- checkout mobile --}}
                <div class="card d-block d-lg-none" style="width: 100%;position: fixed;display: flex; bottom: 0;right: 0;left: 0;">
                    <div class="card-header" style="background-color: #e6595f; color: white;">
                        <h5><b>Checkout</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <h5>Price</h5>
                            </div>
                            <div class="col-6 col-sm-6">
                                <h5 style="color: red;  font-weight: 1000;">Free</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <h5>Total Ticket </h5>
                            </div>
                            <div class="col-6 col-sm-6">
                                <h5 id="outputs" style="">1</h5>
                            </div>
                        </div>
                        <div id="modal"></div>
                        <button type="button" name="add2" id="add2" class="btn btn-md btn-success" style="color: white; width: 100%; margin-bottom: 10px; margin-top: 10px;">Add More Ticket  <i class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="accept" type="checkbox" checked disabled>
                                    <span>
                                        Continue & Accept Terms Conditions
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-dark" style="color: white; width:100%; margin-bottom: 10px; margin-top: 10px;">Purchase Ticket <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("my-form");
            const loadingScreen = document.getElementById("loading-screen");
    
            form.addEventListener("submit", function (event) {
                const visitDayCheckboxes = document.querySelectorAll('input[name="visit_day[]"]');
                const productsInterestedCheckboxes = document.querySelectorAll('input[name="products_interested[]"]');
                const purposeVisitCheckboxes = document.querySelectorAll('input[name="purpose_visit[]"]');
                const typeBusinessCheckboxes = document.querySelectorAll('input[name="type_business[]"]');
    
                let isVisitDayChecked = false;
                let isProductsInterestedChecked = false;
                let isPurposeVisitChecked = false;
                let isTypeBusinessChecked = false;
    
                for (let i = 0; i < visitDayCheckboxes.length; i++) {
                    if (visitDayCheckboxes[i].checked) {
                        isVisitDayChecked = true;
                        break;
                    }
                }
    
                for (let i = 0; i < productsInterestedCheckboxes.length; i++) {
                    if (productsInterestedCheckboxes[i].checked) {
                        isProductsInterestedChecked = true;
                        break;
                    }
                }
    
                for (let i = 0; i < purposeVisitCheckboxes.length; i++) {
                    if (purposeVisitCheckboxes[i].checked) {
                        isPurposeVisitChecked = true;
                        break;
                    }
                }
    
                for (let i = 0; i < typeBusinessCheckboxes.length; i++) {
                    if (typeBusinessCheckboxes[i].checked) {
                        isTypeBusinessChecked = true;
                        break;
                    }
                }
    
                if (!isVisitDayChecked || !isProductsInterestedChecked || !isPurposeVisitChecked || !isTypeBusinessChecked) {
                    alert("Please select at least one of the checklists.");
                    event.preventDefault(); // Prevent form submission
                } else {
                    loadingScreen.style.display = 'flex';
                }
            });
        });
    </script>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>

<script type="text/javascript">
    //function count
    var count = 1;
    var output = document.getElementById('output');
    var outputs = document.getElementById('outputs');

    //function appear form
    var i = 0;
    var no = 1;
    var clickCount = 0;

    $("#add").click(function(){
        var confirmAddTicket = confirm("Are you sure you want to add a ticket?");
        if (confirmAddTicket){
            ++i;
            no++;
            $("#output").text(no);

            if (clickCount < 3) {
                document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Successfully added ticket #'+no+'.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Buyer: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name (Nama Awal) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name (Nama Akhir) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email <b style="color: red;">*</b></h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div> <div class="form-group"><h5>Phone Number (Nomor Telp.) <b style="color: red;">*</b></h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 05 September 2024" id="day1"> <label class="form-check-label" for="day1">Day 1: 05 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 06 September 2024" id="day2"> <label class="form-check-label" for="day2">Day 2: 06 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 07 September 2024" id="day3"> <label class="form-check-label" for="day3">Day 3: 07 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 08 September 2024" id="day4"> <label class="form-check-label" for="day4">Day 4: 08 September 2024</label></div></div><div class="form-group"><h5>Country  (Negara) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_country'+i+'" name="addmore['+i+'][country]" placeholder="Enter your country name" class="form-control" required /></div><div class="form-group"><h5>Company Name (Nama Perusahaan) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_company_name'+i+'" name="addmore['+i+'][company_name]" placeholder="Enter your company_name name" class="form-control" required/></div><div class="form-group"><h5>Job Title (Nama Pekerjaan) </h5><input type="text" class="form-control" id="ticket_job_title'+i+'" name="addmore['+i+'][job_title]" placeholder="Enter your job title" class="form-control" /></div><div class="form-group"><h5>Company Website (Laman Perusahaan)</h5><input type="text" class="form-control" id="ticket_company_website'+i+'" name="addmore['+i+'][company_website]" placeholder="Enter your company website" class="form-control"/></div><h5>Type of Business (Jenis Perusahaan)<b style="color: red;">*</b></h5><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Manufacturer (Pabrik)" id="manufacturer"> <label class="form-check-label" for="manufacturer">Manufacturer (Pabrik)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Exporter (Eksportir)" id="exportir"><label class="form-check-label" for="exportir">Exporter (Eksportir)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Agent (Agen)" id="agent"><label class="form-check-label" for="agent">Agent (Agen)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Wholesaler/Distributor (Grosir/Distributor)" id="wholesaler"><label class="form-check-label" for="wholesaler">Wholesaler/Distributor (Grosir/Distributor)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Department Store/Chain Store (Departemen Store/Minimarketretailer"><label class="form-check-label" for="store">Department Store/Chain Store (Departemen Store/Minimarket)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Independent Retailer (Pengecer)" id="retailer"> <label class="form-check-label" for="retailer">Independent Retailer (Pengecer)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Other (Lain - lain)" id="other"><label class="form-check-label" for="other">Other (Lain - lain)</label></div><br><h5>Purpose of Visit (Tujuan Kunjungan) <b style="color: red;">*</b></h5><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Purchasing (Pembelian)" id="purchasing"><label class="form-check-label" for="purchasing">Purchasing (Pembelian)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Looking for Suppliers (Mencari Pemasok)" id="looking_supplier"><label class="form-check-label" for="looking_supplier">Looking for Suppliers (Mencari Pemasok)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Collecting Information (Mengumpulkan Informasi)" id="collect_info"> <label class="form-check-label" for="collect_info">Collecting Information (Mengumpulkan Informasi)</label></div> <div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Exhibiting at next show (Melihat untuk pameran selanjutnya)" id="exhibiting"><label class="form-check-label" for="exhibiting">Exhibiting at next show (Melihat untuk pameran selanjutnya)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Other (Lain - lain)" id="other"><label class="form-check-label" for="other">Other (Lain - lain)</label></div><br><div class="form-group"><h5>Gender (Jenis Kelamin) <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option value="" disabled selected>please select</option><option value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested (Produk yang Tertarik)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids (Ibu & Anak-Anak)" id="mom"> <label class="form-check-label" for="mom">Mom and Kids (Ibu & Anak-Anak)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion (Kecantikan & Busana)" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion (Kecantikan & Busana)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage (Makanan & Minuman)" id="food"> <label class="form-check-label" for="food">Food and Beverage (Makanan & Minuman)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts (Rumah & Kesenian)" id="home"> <label class="form-check-label" for="home">Home and Arts (Rumah & Kesenian)</label></div></div><div class="form-group"><h5>Registration Code (Kode Registrasi)</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your Registration Code (Kode Registrasi) (optional)" class="form-control" /></div></div></div>');
                clickCount++;
            } else {
                $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Buyer: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name (Nama Awal) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name (Nama Akhir) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email <b style="color: red;">*</b></h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div> <div class="form-group"><h5>Phone Number (Nomor Telp.) <b style="color: red;">*</b></h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 05 September 2024" id="day1"> <label class="form-check-label" for="day1">Day 1: 05 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 06 September 2024" id="day2"> <label class="form-check-label" for="day2">Day 2: 06 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 07 September 2024" id="day3"> <label class="form-check-label" for="day3">Day 3: 07 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 08 September 2024" id="day4"> <label class="form-check-label" for="day4">Day 4: 08 September 2024</label></div></div><div class="form-group"><h5>Country  (Negara) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_country'+i+'" name="addmore['+i+'][country]" placeholder="Enter your country name" class="form-control" required /></div><div class="form-group"><h5>Company Name (Nama Perusahaan) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_company_name'+i+'" name="addmore['+i+'][company_name]" placeholder="Enter your company_name name" class="form-control" required/></div><div class="form-group"><h5>Job Title (Nama Pekerjaan) </h5><input type="text" class="form-control" id="ticket_job_title'+i+'" name="addmore['+i+'][job_title]" placeholder="Enter your job title" class="form-control" /></div><div class="form-group"><h5>Company Website (Laman Perusahaan)</h5><input type="text" class="form-control" id="ticket_company_website'+i+'" name="addmore['+i+'][company_website]" placeholder="Enter your company website" class="form-control"/></div><h5>Type of Business (Jenis Perusahaan)<b style="color: red;">*</b></h5><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Manufacturer (Pabrik)" id="manufacturer"> <label class="form-check-label" for="manufacturer">Manufacturer (Pabrik)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Exporter (Eksportir)" id="exportir"><label class="form-check-label" for="exportir">Exporter (Eksportir)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Agent (Agen)" id="agent"><label class="form-check-label" for="agent">Agent (Agen)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Wholesaler/Distributor (Grosir/Distributor)" id="wholesaler"><label class="form-check-label" for="wholesaler">Wholesaler/Distributor (Grosir/Distributor)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Department Store/Chain Store (Departemen Store/Minimarketretailer"><label class="form-check-label" for="store">Department Store/Chain Store (Departemen Store/Minimarket)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Independent Retailer (Pengecer)" id="retailer"> <label class="form-check-label" for="retailer">Independent Retailer (Pengecer)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Other (Lain - lain)" id="other"><label class="form-check-label" for="other">Other (Lain - lain)</label></div><br><h5>Purpose of Visit (Tujuan Kunjungan) <b style="color: red;">*</b></h5><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Purchasing (Pembelian)" id="purchasing"><label class="form-check-label" for="purchasing">Purchasing (Pembelian)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Looking for Suppliers (Mencari Pemasok)" id="looking_supplier"><label class="form-check-label" for="looking_supplier">Looking for Suppliers (Mencari Pemasok)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Collecting Information (Mengumpulkan Informasi)" id="collect_info"> <label class="form-check-label" for="collect_info">Collecting Information (Mengumpulkan Informasi)</label></div> <div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Exhibiting at next show (Melihat untuk pameran selanjutnya)" id="exhibiting"><label class="form-check-label" for="exhibiting">Exhibiting at next show (Melihat untuk pameran selanjutnya)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Other (Lain - lain)" id="other"><label class="form-check-label" for="other">Other (Lain - lain)</label></div><br><div class="form-group"><h5>Gender (Jenis Kelamin) <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option value="" disabled selected>please select</option><option value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested (Produk yang Tertarik)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids (Ibu & Anak-Anak)" id="mom"> <label class="form-check-label" for="mom">Mom and Kids (Ibu & Anak-Anak)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion (Kecantikan & Busana)" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion (Kecantikan & Busana)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage (Makanan & Minuman)" id="food"> <label class="form-check-label" for="food">Food and Beverage (Makanan & Minuman)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts (Rumah & Kesenian)" id="home"> <label class="form-check-label" for="home">Home and Arts (Rumah & Kesenian)</label></div></div><div class="form-group"><h5>Registration Code (Kode Registrasi)</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your Registration Code (Kode Registrasi) (optional)" class="form-control" /></div></div></div>');
                document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Maximal 5 Ticket.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                document.getElementById('add').disabled = true;
            }
        }
    });

    $("#add2").click(function(){
        var confirmAddTicket = confirm("Are you sure you want to add a ticket?");
        if (confirmAddTicket){
            ++i;
            no++;
            $("#outputs").text(no);

            if (clickCount < 3) {
                document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Successfully added ticket #'+no+'.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Buyer: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name (Nama Awal) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name (Nama Akhir) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email <b style="color: red;">*</b></h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div> <div class="form-group"><h5>Phone Number (Nomor Telp.) <b style="color: red;">*</b></h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 05 September 2024" id="day1"> <label class="form-check-label" for="day1">Day 1: 05 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 06 September 2024" id="day2"> <label class="form-check-label" for="day2">Day 2: 06 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 07 September 2024" id="day3"> <label class="form-check-label" for="day3">Day 3: 07 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 08 September 2024" id="day4"> <label class="form-check-label" for="day4">Day 4: 08 September 2024</label></div></div><div class="form-group"><h5>Country  (Negara) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_country'+i+'" name="addmore['+i+'][country]" placeholder="Enter your country name" class="form-control" required /></div><div class="form-group"><h5>Company Name (Nama Perusahaan) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_company_name'+i+'" name="addmore['+i+'][company_name]" placeholder="Enter your company_name name" class="form-control" required/></div><div class="form-group"><h5>Job Title (Nama Pekerjaan) </h5><input type="text" class="form-control" id="ticket_job_title'+i+'" name="addmore['+i+'][job_title]" placeholder="Enter your job title" class="form-control" /></div><div class="form-group"><h5>Company Website (Laman Perusahaan)</h5><input type="text" class="form-control" id="ticket_company_website'+i+'" name="addmore['+i+'][company_website]" placeholder="Enter your company website" class="form-control"/></div><h5>Type of Business (Jenis Perusahaan)<b style="color: red;">*</b></h5><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Manufacturer (Pabrik)" id="manufacturer"> <label class="form-check-label" for="manufacturer">Manufacturer (Pabrik)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Exporter (Eksportir)" id="exportir"><label class="form-check-label" for="exportir">Exporter (Eksportir)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Agent (Agen)" id="agent"><label class="form-check-label" for="agent">Agent (Agen)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Wholesaler/Distributor (Grosir/Distributor)" id="wholesaler"><label class="form-check-label" for="wholesaler">Wholesaler/Distributor (Grosir/Distributor)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Department Store/Chain Store (Departemen Store/Minimarketretailer"><label class="form-check-label" for="store">Department Store/Chain Store (Departemen Store/Minimarket)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Independent Retailer (Pengecer)" id="retailer"> <label class="form-check-label" for="retailer">Independent Retailer (Pengecer)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Other (Lain - lain)" id="other"><label class="form-check-label" for="other">Other (Lain - lain)</label></div><br><h5>Purpose of Visit (Tujuan Kunjungan) <b style="color: red;">*</b></h5><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Purchasing (Pembelian)" id="purchasing"><label class="form-check-label" for="purchasing">Purchasing (Pembelian)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Looking for Suppliers (Mencari Pemasok)" id="looking_supplier"><label class="form-check-label" for="looking_supplier">Looking for Suppliers (Mencari Pemasok)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Collecting Information (Mengumpulkan Informasi)" id="collect_info"> <label class="form-check-label" for="collect_info">Collecting Information (Mengumpulkan Informasi)</label></div> <div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Exhibiting at next show (Melihat untuk pameran selanjutnya)" id="exhibiting"><label class="form-check-label" for="exhibiting">Exhibiting at next show (Melihat untuk pameran selanjutnya)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Other (Lain - lain)" id="other"><label class="form-check-label" for="other">Other (Lain - lain)</label></div><br><div class="form-group"><h5>Gender (Jenis Kelamin) <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option value="" disabled selected>please select</option><option value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested (Produk yang Tertarik)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids (Ibu & Anak-Anak)" id="mom"> <label class="form-check-label" for="mom">Mom and Kids (Ibu & Anak-Anak)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion (Kecantikan & Busana)" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion (Kecantikan & Busana)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage (Makanan & Minuman)" id="food"> <label class="form-check-label" for="food">Food and Beverage (Makanan & Minuman)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts (Rumah & Kesenian)" id="home"> <label class="form-check-label" for="home">Home and Arts (Rumah & Kesenian)</label></div></div><div class="form-group"><h5>Registration Code (Kode Registrasi)</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your Registration Code (Kode Registrasi) (optional)" class="form-control" /></div></div></div>');
                clickCount++;
            } else {
                $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Buyer: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name (Nama Awal) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name (Nama Akhir) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email <b style="color: red;">*</b></h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div> <div class="form-group"><h5>Phone Number (Nomor Telp.) <b style="color: red;">*</b></h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 05 September 2024" id="day1"> <label class="form-check-label" for="day1">Day 1: 05 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 06 September 2024" id="day2"> <label class="form-check-label" for="day2">Day 2: 06 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 07 September 2024" id="day3"> <label class="form-check-label" for="day3">Day 3: 07 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 08 September 2024" id="day4"> <label class="form-check-label" for="day4">Day 4: 08 September 2024</label></div></div><div class="form-group"><h5>Country  (Negara) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_country'+i+'" name="addmore['+i+'][country]" placeholder="Enter your country name" class="form-control" required /></div><div class="form-group"><h5>Company Name (Nama Perusahaan) <b style="color: red;">*</b></h5><input type="text" class="form-control" id="ticket_company_name'+i+'" name="addmore['+i+'][company_name]" placeholder="Enter your company_name name" class="form-control" required/></div><div class="form-group"><h5>Job Title (Nama Pekerjaan) </h5><input type="text" class="form-control" id="ticket_job_title'+i+'" name="addmore['+i+'][job_title]" placeholder="Enter your job title" class="form-control" /></div><div class="form-group"><h5>Company Website (Laman Perusahaan)</h5><input type="text" class="form-control" id="ticket_company_website'+i+'" name="addmore['+i+'][company_website]" placeholder="Enter your company website" class="form-control"/></div><h5>Type of Business (Jenis Perusahaan)<b style="color: red;">*</b></h5><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Manufacturer (Pabrik)" id="manufacturer"> <label class="form-check-label" for="manufacturer">Manufacturer (Pabrik)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Exporter (Eksportir)" id="exportir"><label class="form-check-label" for="exportir">Exporter (Eksportir)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Agent (Agen)" id="agent"><label class="form-check-label" for="agent">Agent (Agen)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Wholesaler/Distributor (Grosir/Distributor)" id="wholesaler"><label class="form-check-label" for="wholesaler">Wholesaler/Distributor (Grosir/Distributor)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Department Store/Chain Store (Departemen Store/Minimarketretailer"><label class="form-check-label" for="store">Department Store/Chain Store (Departemen Store/Minimarket)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Independent Retailer (Pengecer)" id="retailer"> <label class="form-check-label" for="retailer">Independent Retailer (Pengecer)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][type_business][]" type="checkbox" value="Other (Lain - lain)" id="other"><label class="form-check-label" for="other">Other (Lain - lain)</label></div><br><h5>Purpose of Visit (Tujuan Kunjungan) <b style="color: red;">*</b></h5><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Purchasing (Pembelian)" id="purchasing"><label class="form-check-label" for="purchasing">Purchasing (Pembelian)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Looking for Suppliers (Mencari Pemasok)" id="looking_supplier"><label class="form-check-label" for="looking_supplier">Looking for Suppliers (Mencari Pemasok)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Collecting Information (Mengumpulkan Informasi)" id="collect_info"> <label class="form-check-label" for="collect_info">Collecting Information (Mengumpulkan Informasi)</label></div> <div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Exhibiting at next show (Melihat untuk pameran selanjutnya)" id="exhibiting"><label class="form-check-label" for="exhibiting">Exhibiting at next show (Melihat untuk pameran selanjutnya)</label></div><div class="form-check"><input class="form-check-input" name="addmore['+i+'][purpose_visit][]" type="checkbox" value="Other (Lain - lain)" id="other"><label class="form-check-label" for="other">Other (Lain - lain)</label></div><br><div class="form-group"><h5>Gender (Jenis Kelamin) <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option value="" disabled selected>please select</option><option value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested (Produk yang Tertarik)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids (Ibu & Anak-Anak)" id="mom"> <label class="form-check-label" for="mom">Mom and Kids (Ibu & Anak-Anak)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion (Kecantikan & Busana)" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion (Kecantikan & Busana)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage (Makanan & Minuman)" id="food"> <label class="form-check-label" for="food">Food and Beverage (Makanan & Minuman)</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts (Rumah & Kesenian)" id="home"> <label class="form-check-label" for="home">Home and Arts (Rumah & Kesenian)</label></div></div><div class="form-group"><h5>Registration Code (Kode Registrasi)</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your Registration Code (Kode Registrasi) (optional)" class="form-control" /></div></div></div>');
                document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Maximal 5 Ticket.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                document.getElementById('add').disabled = true;
            }
        }
    });
    // <h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 05 September 2024" id="day1"> <label class="form-check-label" for="day1">Day 1: 05 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 06 September 2024" id="day2"> <label class="form-check-label" for="day2">Day 2: 06 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 07 September 2024" id="day3"> <label class="form-check-label" for="day3">Day 3: 07 September 2024</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 08 September 2024" id="day4"> <label class="form-check-label" for="day4">Day 4: 08 September 2024</label></div></div>
    function alertDelete() {
        alert("Are you sure want to remove ticket?");
    }

    $(document).on('click', '.remove-tr', function(){
        $(this).parents('.card').remove();
        count--;
        output.innerHTML = count;
    });

    //function same contact
    function samecontact_order(i) {
        var checkBox = document.getElementById("same_contact"+i);
        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var visit_day = document.getElementById("visit_day").value;
        var company_name = document.getElementById("company_name").value;
        var job_title = document.getElementById("job_title").value;
        var company_website = document.getElementById("company_website").value;
        var gender = document.getElementById("gender").value;
        var products_interested = document.getElementById("products_interested").value;
        var registration_code = document.getElementById("registration_code").value;
        var country = document.getElementById("country").value;

        if (checkBox.checked == true) {
            document.getElementById("ticket_first_name"+i).value = first_name;
            document.getElementById("ticket_last_name"+i).value = last_name;
            document.getElementById("ticket_email"+i).value = email;
            document.getElementById("ticket_phone"+i).value = phone;
            // document.getElementById("ticket_visit_day"+i).value = visit_day;
            document.getElementById("ticket_company_name"+i).value = company_name;
            document.getElementById("ticket_job_title"+i).value = job_title;
            document.getElementById("ticket_country"+i).value = country;
            document.getElementById("ticket_company_website"+i).value = company_website;
            document.getElementById("ticket_gender"+i).value = gender;
            document.getElementById("ticket_products_interested"+i).value = products_interested;
            document.getElementById("ticket_registration_code"+i).value = registration_code;
        } else {
            document.getElementById("ticket_first_name"+i).value = "";
            document.getElementById("ticket_last_name"+i).value = "";
            document.getElementById("ticket_email"+i).value = "";
            document.getElementById("ticket_phone"+i).value = "";
            // document.getElementById("ticket_visit_day"+i).value = "";
            document.getElementById("ticket_company_name"+i).value = "";
            document.getElementById("ticket_job_title"+i).value = "";
            document.getElementById("ticket_country"+i).value = "";
            document.getElementById("ticket_company_website"+i).value = "";
            document.getElementById("ticket_gender"+i).value = "";
            document.getElementById("ticket_products_interested"+i).value = "";
            document.getElementById("ticket_registration_code"+i).value = "";
        }
    }
</script>
@endsection
