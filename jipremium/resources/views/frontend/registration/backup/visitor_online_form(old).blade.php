@extends('layout.layout_front')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<style>
    .card{
        box-shadow: 0 3px 8px rgba(0,0,0,0.16), 0 3px 8px rgba(0,0,0,0.23);
    }
</style>

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

    <form action="{{ route('visitor_online.store') }}" id="my-form" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-8" id="dynamicTable">
                <div class="card" style="border-radius:15px;">
                    <div class="card-header" style="background-color: #e6595f; color: white; border-radius: 15px 15px 0px 0px;">
                        <h5><b>Ticket #1</b></h5>
                        <h5>Visitor: Online Pre-Registration</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <h5>First Name <b style="color: red;">*</b></h5>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your Name" class="form-control" required />
                                </div>
                                <div class="col-6 col-sm-6">
                                    <h5>Last Name <b style="color: red;">*</b></h5>
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
                            <h5>Phone Number <b style="color: red;">*</b></h5>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" class="form-control" required />
                        </div>

                        <h5>Visit Day (Hari Kunjungan) <b style="color: red;">*</b></h5>
                        <div class="form-group" id="visit_day">
                            <div class="form-check">
                                <input class="form-check-input" name="visit_day[]" type="checkbox" value="Day 1: 14 September 2023" id="day1">
                                <label class="form-check-label" for="day1">
                                    Day 1: 14 September 2023
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="visit_day[]" type="checkbox" value="Day 2: 15 September 2023" id="day2">
                                <label class="form-check-label" for="day2">
                                    Day 2: 15 September 2023
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="visit_day[]" type="checkbox" value="Day 3: 16 September 2023" id="day3">
                                <label class="form-check-label" for="day3">
                                    Day 3: 16 September 2023
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="visit_day[]" type="checkbox" value="Day 4: 17 September 2023" id="day4">
                                <label class="form-check-label" for="day4">
                                    Day 4: 17 September 2023
                                </label>
                            </div>
                        </div>
                        <br>
                        
                        {{-- <div class="form-group">
                            <h5>Visit Day (Hari Kunjungan) <b style="color: red;">*</b></h5>
                            <select class="form-select" id="visit_day" name="visit_day" aria-label="Default select example" required>
                                <option selected value="Day 1: 14 September 2023">Day 1: 14 September 2023</option>
                                <option value="Day 2: 15 September 2023">Day 2: 15 September 2023</option>
                                <option value="Day 3: 16 September 2023">Day 3: 16 September 2023</option>
                                <option value="Day 4: 17 September 2023">Day 4: 17 September 2023</option>
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <h5>City (Kota)</h5>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city name" class="form-control" />
                        </div>

                        <div class="form-group">
                            <h5>Profession <b style="color: red;">*</b></h5>
                            <select class="form-select" id="profession" name="profession" aria-label="Default select example" required>
                                <option value="" disabled selected>please select</option>
                                <option value="Student">Student</option>
                                <option value="Entrepreneur">Entrepreneur</option>
                                <option value="Government Employee">Government Employee</option>
                                <option value="Private Employee">Private Employee</option>
                                <option value="House Wife">House Wife</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <h5>Age <b style="color: red;">*</b></h5>
                            <select class="form-select" id="age" name="age" aria-label="Default select example" required>
                                <option value="" disabled selected>please select</option>
                                <option value="Kurang Dari 21">Kurang Dari 21</option>
                                <option value="21-35">21-35</option>
                                <option value="35-50">35-50</option>
                                <option value="Lebih Dari 50">Lebih Dari 50</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <h5>Gender <b style="color: red;">*</b></h5>
                            <select class="form-select" id="gender" name="gender" aria-label="Default select example" required>
                                <option value="" disabled selected>please select</option>
                                <option value="Man (Laki-Laki)">Man (Laki-Laki)</option>
                                <option value="Woman (Perempuan)">Woman (Perempuan)</option>
                            </select>
                        </div>

                        {{-- <div class="form-group">
                            <h5>Products Interested <b style="color: red;">*</b></h5>
                            <select class="form-select" id="products_interested" name="products_interested" aria-label="Default select example" required>
                                <option value="Mom and Kids">Mom and Kids</option>
                                <option selected value="Beauty and Fashion">Beauty and Fashion</option>
                                <option value="Food and Beverage">Food and Beverage</option>
                                <option value="Home and Arts">Home and Arts</option>
                            </select>
                        </div> --}}

                        <div class="form-group" id="products_interested">
                            <h5>Products Interested <b style="color: red;">*</b></h5>
                            <div class="form-check">
                                <input class="form-check-input" name="products_interested[]" type="checkbox" value="Mom and Kids" id="mom">
                                <label class="form-check-label" for="mom">
                                    Mom and Kids
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="products_interested[]" type="checkbox" value="Beauty and Fashion" id="beauty">
                                <label class="form-check-label" for="beauty">
                                    Beauty and Fashion
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="products_interested[]" type="checkbox" value="Food and Beverage" id="food">
                                <label class="form-check-label" for="food">
                                    Food and Beverage
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="products_interested[]" type="checkbox" value="Home and Arts" id="home">
                                <label class="form-check-label" for="home">
                                    Home and Arts
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Registration Code</h5>
                            <input type="text" class="form-control" id="registration_code" name="registration_code" placeholder="Enter your registration code (optional)" class="form-control" />
                        </div>
                        <br>                      
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
                            <button type="button" name="add" id="add" class="btn btn-md btn-success" style="color: white; width: 100%; margin-bottom: 10px; margin-top: 10px;" onclick="countClicks()">Add More Ticket  <i class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" name="accept" type="checkbox" checked disabled>
                                    <label class="form-check-label" style="opacity: 2.5;">
                                        Continue & Accept Terms Conditions
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-md btn-dark" style="color: white; width: 100%; margin-bottom: 10px; margin-top: 10px;">Purchase Ticket <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- checkout mobile --}}
                <div class="card d-block d-lg-none" style="position: sticky; top: 52px; border-radius:15px; margin-bottom: 15px;">
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
                                <h5 id="outputs" style="">1</h5>
                            </div>
                        </div>
                		<div id="modal"></div>
                        <button type="button" name="add2" id="add2" class="btn btn-md btn-success" style="color: white; width: 100%; margin-bottom: 10px; margin-top: 10px;" onclick="countClicks2()">Add More Ticket  <i class="fa-solid fa-plus"></i></button>
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
</div>

{{-- <h5>Products Interested<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids" id="mom"> <label class="form-check-label" for="mom">Mom and Kids</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage" id="food"> <label class="form-check-label" for="food">Food and Beverage</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts" id="home"> <label class="form-check-label" for="home">Home and Arts</label></div></div> --}}

<script type="text/javascript">
    //function count
    var count = 1;
    var output = document.getElementById('output');
    var outputs = document.getElementById('outputs');

    function countClicks(){
        count++;
        output.innerHTML = count;
        outputs.innerHTML = count;
        alert("Are you sure want to add more ticket?");
    }
	
	function countClicks2(){
        count++;
        output.innerHTML = count;
        outputs.innerHTML = count;
        alert("Are you sure want to add more ticket?");
    }

    //function appear form
    var i = 0;
    var no = 1;
    var clickCount = 0;

    $("#add").click(function(){
        ++i;
        no++;

        if (clickCount < 3) {
            document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Successfully added ticket #'+no+'.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Visitor: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name</h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name</h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email</h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div><div class="form-group"><h5>Phone Number</h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 14 September 2023" id="day1"> <label class="form-check-label" for="day1">Day 1: 14 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 15 September 2023" id="day2"> <label class="form-check-label" for="day2">Day 2: 15 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 16 September 2023" id="day3"> <label class="form-check-label" for="day3">Day 3: 16 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 17 September 2023" id="day4"> <label class="form-check-label" for="day4">Day 4: 17 September 2023</label></div></div><br><div class="form-group"><h5>City (Kota)</h5><input type="text" class="form-control" id="ticket_city'+i+'" name="addmore['+i+'][city]" placeholder="Enter your city name" class="form-control" /></div><div class="form-group"><h5>Profession <b style="color: red;">*</b></h5><select class="form-select" id="ticket_profession'+i+'" name="addmore['+i+'][profession]" aria-label="Default select example" required><option value="Student">Student</option><option selected value="Entrepreneur">Entrepreneur</option><option value="Government Employee">Government Employee</option><option value="Private Employee">Private Employee</option><option value="House Wife">House Wife</option></select></div><div class="form-group"><h5>Age <b style="color: red;">*</b></h5><select class="form-select" id="ticket_age'+i+'" name="addmore['+i+'][age]" aria-label="Default select example" required><option value="Kurang Dari 21">Kurang Dari 21</option><option selected value="21-35">21-35</option><option value="35-50">35-50</option><option value="Lebih Dari 50">Lebih Dari 50</option></select></div><div class="form-group"><h5>Gender <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option selected value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids" id="mom"> <label class="form-check-label" for="mom">Mom and Kids</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage" id="food"> <label class="form-check-label" for="food">Food and Beverage</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts" id="home"> <label class="form-check-label" for="home">Home and Arts</label></div></div><div class="form-group"><h5>Registration Code</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your registration code (optional)" class="form-control" /></div></div></div>');
            clickCount++;
        } else {
            $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Visitor: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name</h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name</h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email</h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div><div class="form-group"><h5>Phone Number</h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 14 September 2023" id="day1"> <label class="form-check-label" for="day1">Day 1: 14 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 15 September 2023" id="day2"> <label class="form-check-label" for="day2">Day 2: 15 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 16 September 2023" id="day3"> <label class="form-check-label" for="day3">Day 3: 16 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 17 September 2023" id="day4"> <label class="form-check-label" for="day4">Day 4: 17 September 2023</label></div></div><br><div class="form-group"><h5>City (Kota)</h5><input type="text" class="form-control" id="ticket_city'+i+'" name="addmore['+i+'][city]" placeholder="Enter your city name" class="form-control" /></div><div class="form-group"><h5>Profession <b style="color: red;">*</b></h5><select class="form-select" id="ticket_profession'+i+'" name="addmore['+i+'][profession]" aria-label="Default select example" required><option value="Student">Student</option><option selected value="Entrepreneur">Entrepreneur</option><option value="Government Employee">Government Employee</option><option value="Private Employee">Private Employee</option><option value="House Wife">House Wife</option></select></div><div class="form-group"><h5>Age <b style="color: red;">*</b></h5><select class="form-select" id="ticket_age'+i+'" name="addmore['+i+'][age]" aria-label="Default select example" required><option value="Kurang Dari 21">Kurang Dari 21</option><option selected value="21-35">21-35</option><option value="35-50">35-50</option><option value="Lebih Dari 50">Lebih Dari 50</option></select></div><div class="form-group"><h5>Gender <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option selected value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids" id="mom"> <label class="form-check-label" for="mom">Mom and Kids</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage" id="food"> <label class="form-check-label" for="food">Food and Beverage</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts" id="home"> <label class="form-check-label" for="home">Home and Arts</label></div></div><div class="form-group"><h5>Registration Code</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your registration code (optional)" class="form-control" /></div></div></div>');
            document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Maximal 5 Ticket.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            document.getElementById('add').disabled = true;
        }

        // document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Successfully added ticket #'+no+'.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        //     $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Visitor: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name</h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name</h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email</h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div><div class="form-group"><h5>Phone Number</h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><div class="form-group"><h5>Visit Day (Hari Kunjungan) <b style="color: red;">*</b></h5><select class="form-select" id="ticket_visit_day'+i+'" name="addmore['+i+'][visit_day]" aria-label="Default select example" required><option selected value="Day 1: 14 September 2023">Day 1: 14 September 2023</option><option value="Day 2: 15 September 2023">Day 2: 15 September 2023</option><option value="Day 3: 16 September 2023">Day 3: 16 September 2023</option><option value="Day 4: 17 September 2023">Day 4: 17 September 2023</option></select></div><div class="form-group"><h5>City (Kota)</h5><input type="text" class="form-control" id="ticket_city'+i+'" name="addmore['+i+'][city]" placeholder="Enter your city name" class="form-control" /></div><div class="form-group"><h5>Profession <b style="color: red;">*</b></h5><select class="form-select" id="ticket_profession'+i+'" name="addmore['+i+'][profession]" aria-label="Default select example" required><option value="Student">Student</option><option selected value="Entrepreneur">Entrepreneur</option><option value="Government Employee">Government Employee</option><option value="Private Employee">Private Employee</option><option value="House Wife">House Wife</option></select></div><div class="form-group"><h5>Age <b style="color: red;">*</b></h5><select class="form-select" id="ticket_age'+i+'" name="addmore['+i+'][age]" aria-label="Default select example" required><option value="Kurang Dari 21">Kurang Dari 21</option><option selected value="21-35">21-35</option><option value="35-50">35-50</option><option value="Lebih Dari 50">Lebih Dari 50</option></select></div><div class="form-group"><h5>Gender <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option selected value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids" id="mom"> <label class="form-check-label" for="mom">Mom and Kids</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage" id="food"> <label class="form-check-label" for="food">Food and Beverage</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts" id="home"> <label class="form-check-label" for="home">Home and Arts</label></div></div><div class="form-group"><h5>Registration Code</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your registration code (optional)" class="form-control" /></div></div></div>');
    });

$("#add2").click(function(){
        ++i;
        no++;

        if (clickCount < 3) {
            document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Successfully added ticket #'+no+'.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Visitor: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name</h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name</h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email</h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div><div class="form-group"><h5>Phone Number</h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 14 September 2023" id="day1"> <label class="form-check-label" for="day1">Day 1: 14 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 15 September 2023" id="day2"> <label class="form-check-label" for="day2">Day 2: 15 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 16 September 2023" id="day3"> <label class="form-check-label" for="day3">Day 3: 16 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 17 September 2023" id="day4"> <label class="form-check-label" for="day4">Day 4: 17 September 2023</label></div></div><br><div class="form-group"><h5>City (Kota)</h5><input type="text" class="form-control" id="ticket_city'+i+'" name="addmore['+i+'][city]" placeholder="Enter your city name" class="form-control" /></div><div class="form-group"><h5>Profession <b style="color: red;">*</b></h5><select class="form-select" id="ticket_profession'+i+'" name="addmore['+i+'][profession]" aria-label="Default select example" required><option value="Student">Student</option><option selected value="Entrepreneur">Entrepreneur</option><option value="Government Employee">Government Employee</option><option value="Private Employee">Private Employee</option><option value="House Wife">House Wife</option></select></div><div class="form-group"><h5>Age <b style="color: red;">*</b></h5><select class="form-select" id="ticket_age'+i+'" name="addmore['+i+'][age]" aria-label="Default select example" required><option value="Kurang Dari 21">Kurang Dari 21</option><option selected value="21-35">21-35</option><option value="35-50">35-50</option><option value="Lebih Dari 50">Lebih Dari 50</option></select></div><div class="form-group"><h5>Gender <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option selected value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids" id="mom"> <label class="form-check-label" for="mom">Mom and Kids</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage" id="food"> <label class="form-check-label" for="food">Food and Beverage</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts" id="home"> <label class="form-check-label" for="home">Home and Arts</label></div></div><div class="form-group"><h5>Registration Code</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your registration code (optional)" class="form-control" /></div></div></div>');
            clickCount++;
        } else {
            $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Visitor: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name</h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name</h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email</h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div><div class="form-group"><h5>Phone Number</h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><h5>Visit Day (Hari Kunjungan)<b style="color: red;">*</b></h5><div class="form-group" id="ticket_visit_day"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 1: 14 September 2023" id="day1"> <label class="form-check-label" for="day1">Day 1: 14 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 2: 15 September 2023" id="day2"> <label class="form-check-label" for="day2">Day 2: 15 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 3: 16 September 2023" id="day3"> <label class="form-check-label" for="day3">Day 3: 16 September 2023</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][visit_day][]" type="checkbox" value="Day 4: 17 September 2023" id="day4"> <label class="form-check-label" for="day4">Day 4: 17 September 2023</label></div></div><br><div class="form-group"><h5>City (Kota)</h5><input type="text" class="form-control" id="ticket_city'+i+'" name="addmore['+i+'][city]" placeholder="Enter your city name" class="form-control" /></div><div class="form-group"><h5>Profession <b style="color: red;">*</b></h5><select class="form-select" id="ticket_profession'+i+'" name="addmore['+i+'][profession]" aria-label="Default select example" required><option value="Student">Student</option><option selected value="Entrepreneur">Entrepreneur</option><option value="Government Employee">Government Employee</option><option value="Private Employee">Private Employee</option><option value="House Wife">House Wife</option></select></div><div class="form-group"><h5>Age <b style="color: red;">*</b></h5><select class="form-select" id="ticket_age'+i+'" name="addmore['+i+'][age]" aria-label="Default select example" required><option value="Kurang Dari 21">Kurang Dari 21</option><option selected value="21-35">21-35</option><option value="35-50">35-50</option><option value="Lebih Dari 50">Lebih Dari 50</option></select></div><div class="form-group"><h5>Gender <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option selected value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids" id="mom"> <label class="form-check-label" for="mom">Mom and Kids</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage" id="food"> <label class="form-check-label" for="food">Food and Beverage</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts" id="home"> <label class="form-check-label" for="home">Home and Arts</label></div></div><div class="form-group"><h5>Registration Code</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your registration code (optional)" class="form-control" /></div></div></div>');
            document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Maximal 5 Ticket.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            document.getElementById('add').disabled = true;
        }

        // document.getElementById("modal").innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Successfully added ticket #'+no+'.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        //     $("#dynamicTable").append('<div class="card" style="border-radius: 15px; margin-bottom: 15px;"><div class="card-header" style="background-color: #e6595f; color:white; border-radius: 15px 15px 0px 0px;"><h5><b>Ticket #'+no+'</b></h5><h5>Visitor: Online Pre-Registration</h5></div><div class="card-body"><div class="row"><div class="col-12 col-sm-12" style="margin-bottom: 10px;"><input type="checkbox" id="same_contact'+i+'" class="default" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)"  onclick="samecontact_order('+i+')"><span style="font-size:14px;"> Same as first ticket</span></div></div><div class="form-group"><div class="row"><div class="col-6 col-sm-6"><h5>First Name</h5><input type="text" class="form-control" id="ticket_first_name'+i+'" name="addmore['+i+'][first_name]" placeholder="Enter your Name" class="form-control" required /></div><div class="col-6 col-sm-6"><h5>Last Name</h5><input type="text" class="form-control" id="ticket_last_name'+i+'" name="addmore['+i+'][last_name]" placeholder="Enter your Name" class="form-control" required /></div></div></div><div class="form-group"><h5>Email</h5><input type="email" id="ticket_email'+i+'" name="addmore['+i+'][email]" placeholder="Enter your Email" class="form-control" required /></div><div class="form-group"><h5>Phone Number</h5><input type="number" id="ticket_phone'+i+'" name="addmore['+i+'][phone]" placeholder="Enter your Phone Number" class="form-control"  required /></div><div class="form-group"><h5>Visit Day (Hari Kunjungan) <b style="color: red;">*</b></h5><select class="form-select" id="ticket_visit_day'+i+'" name="addmore['+i+'][visit_day]" aria-label="Default select example" required><option selected value="Day 1: 14 September 2023">Day 1: 14 September 2023</option><option value="Day 2: 15 September 2023">Day 2: 15 September 2023</option><option value="Day 3: 16 September 2023">Day 3: 16 September 2023</option><option value="Day 4: 17 September 2023">Day 4: 17 September 2023</option></select></div><div class="form-group"><h5>City (Kota)</h5><input type="text" class="form-control" id="ticket_city'+i+'" name="addmore['+i+'][city]" placeholder="Enter your city name" class="form-control" /></div><div class="form-group"><h5>Profession <b style="color: red;">*</b></h5><select class="form-select" id="ticket_profession'+i+'" name="addmore['+i+'][profession]" aria-label="Default select example" required><option value="Student">Student</option><option selected value="Entrepreneur">Entrepreneur</option><option value="Government Employee">Government Employee</option><option value="Private Employee">Private Employee</option><option value="House Wife">House Wife</option></select></div><div class="form-group"><h5>Age <b style="color: red;">*</b></h5><select class="form-select" id="ticket_age'+i+'" name="addmore['+i+'][age]" aria-label="Default select example" required><option value="Kurang Dari 21">Kurang Dari 21</option><option selected value="21-35">21-35</option><option value="35-50">35-50</option><option value="Lebih Dari 50">Lebih Dari 50</option></select></div><div class="form-group"><h5>Gender <b style="color: red;">*</b></h5><select class="form-select" id="ticket_gender'+i+'" name="addmore['+i+'][gender]" aria-label="Default select example" required><option selected value="Man (Laki-Laki)">Man (Laki-Laki)</option><option value="Woman (Perempuan)">Woman (Perempuan)</option></select></div><h5>Products Interested<b style="color: red;">*</b></h5><div class="form-group" id="ticket_products_interested"><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Mom and Kids" id="mom"> <label class="form-check-label" for="mom">Mom and Kids</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Beauty and Fashion" id="beauty"> <label class="form-check-label" for="beauty">Beauty and Fashion</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Food and Beverage" id="food"> <label class="form-check-label" for="food">Food and Beverage</label></div><div class="form-check"> <input class="form-check-input" name="addmore['+i+'][products_interested][]" type="checkbox" value="Home and Arts" id="home"> <label class="form-check-label" for="home">Home and Arts</label></div></div><div class="form-group"><h5>Registration Code</h5><input type="text" class="form-control" id="ticket_registration_code'+i+'" name="addmore['+i+'][registration_code]" placeholder="Enter your registration code (optional)" class="form-control" /></div></div></div>');
    });

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
        var city = document.getElementById("city").value;
        var profession = document.getElementById("profession").value;
        var age = document.getElementById("age").value;
        var gender = document.getElementById("gender").value;
        var products_interested = document.getElementById("products_interested").value;
        var registration_code = document.getElementById("registration_code").value;

        if (checkBox.checked == true) {
            document.getElementById("ticket_first_name"+i).value = first_name;
            document.getElementById("ticket_last_name"+i).value = last_name;
            document.getElementById("ticket_email"+i).value = email;
            document.getElementById("ticket_phone"+i).value = phone;
            document.getElementById("ticket_visit_day"+i).value = visit_day;
            document.getElementById("ticket_city"+i).value = city;
            document.getElementById("ticket_profession"+i).value = profession;
            document.getElementById("ticket_age"+i).value = age;
            document.getElementById("ticket_gender"+i).value = gender;
            document.getElementById("ticket_products_interested"+i).value = products_interested;
            document.getElementById("ticket_registration_code"+i).value = registration_code;
        } else {
            document.getElementById("ticket_first_name"+i).value = "";
            document.getElementById("ticket_last_name"+i).value = "";
            document.getElementById("ticket_email"+i).value = "";
            document.getElementById("ticket_phone"+i).value = "";
            document.getElementById("ticket_visit_day"+i).value = "";
            document.getElementById("ticket_city"+i).value = "";
            document.getElementById("ticket_profession"+i).value = "";
            document.getElementById("ticket_age"+i).value = "";
            document.getElementById("ticket_gender"+i).value = "";
            document.getElementById("ticket_products_interested"+i).value = "";
            document.getElementById("ticket_registration_code"+i).value = "";
        }
    }
</script>
@endsection
