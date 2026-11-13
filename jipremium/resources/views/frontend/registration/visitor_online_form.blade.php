@extends('layout.layout_front_nofooter')
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
                <!-- <h4 style="font-size: 2.4rem; margin-top: 65px;">Order Your Ticket</h4> -->
                <h4 style="font-size: 2.4rem; margin-top: 65px;">Registration Event - Online</h4>
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

    <form action="{{ route('visitor_online.store') }}" id="registration-form" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-8" id="ticket-forms">
                {{-- form ticket akan tampil disini --}}
            </div>
            <div class="col-md-4">
                <div class="card sticky-top" style="border-radius:15px; top: 20px;">
                    <div class="card-header" style="background-color: #e6595f; color: white; border-radius: 15px 15px 0px 0px;">
                        <h5><b>Checkout</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <h5>Price</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="text-danger fw-bold">Free</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <h5>Total Tickets</h5>
                            </div>
                            <div class="col-6">
                                <h5 id="ticket-count">0</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-8">
                                <input type="number" id="ticket-quantity" class="form-control" value="1" min="1" max="5">
                            </div>
                            <div class="col-4">
                                <button type="button" id="add-ticket" class="btn btn-success w-100">
                                    Add <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" checked disabled>
                            <label class="form-check-label">
                                Continue & Accept Terms Conditions
                            </label>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">
                            <!-- Purchase Ticket <i class="fas fa-arrow-right"></i> -->
                            Get Your Ticket <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let ticketCount = 0;
        const addTicketBtn = document.getElementById('add-ticket');
        const ticketForms = document.getElementById('ticket-forms');
        const ticketCountDisplay = document.getElementById('ticket-count');
        const ticketQuantityInput = document.getElementById('ticket-quantity');

        function addTicket() {
            const newTicket = createTicketHTML(ticketCount);
            ticketForms.insertAdjacentHTML('beforeend', newTicket);
            ticketCount++;
            updateTicketCount();
        }

        function createTicketHTML(ticketIndex) {
            let sameAsFirstTicketCheckbox = '';
            if (ticketIndex > 0) {
                sameAsFirstTicketCheckbox = `
                    <div class="form-check mb-3">
                        <input class="form-check-input same-as-first" type="checkbox" id="sameAsFirst_${ticketIndex}">
                        <label class="form-check-label" for="sameAsFirst_${ticketIndex}">
                            Same as First Ticket
                        </label>
                    </div>
                `;
            }

            return `
                <div class="ticket-form card mb-3" style="border-radius:15px;" data-index="${ticketIndex}">
                    <div class="card-header" style="background-color: #e6595f; color: white; border-radius: 15px 15px 0px 0px;">
                        <h5><b>Ticket #${ticketIndex + 1}</b></h5>
                        <h5>Visitor: Online Pre-Registration</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <h5><b>First Name</b> <b style="color: red;">*</b></h5>
                                    <input type="text" class="form-control" id="first_name_${ticketIndex}" name="tickets[${ticketIndex}][first_name]" placeholder="Enter your First Name" required />
                                </div>
                                <div class="col-6 col-sm-6">
                                    <h5><b>Last Name</b> <b style="color: red;">*</b></h5>
                                    <input type="text" class="form-control" id="last_name_${ticketIndex}" name="tickets[${ticketIndex}][last_name]" placeholder="Enter your Last Name" required />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5><b>Email</b> <b style="color: red;">*</b></h5>
                            <input type="email" class="form-control" id="email_${ticketIndex}" name="tickets[${ticketIndex}][email]" placeholder="Enter your Email" required />
                        </div>
                        <div class="form-group">
                            <h5><b>Phone Number</b> <b style="color: red;">*</b></h5>
                            <input type="number" class="form-control" id="phone_${ticketIndex}" name="tickets[${ticketIndex}][phone]" placeholder="Enter your Phone Number" required />
                        </div>


                        ${sameAsFirstTicketCheckbox}

                        ${@json($fields).map((field, fieldIndex) => `
                            <div class="form-group mb-3">
                                <h5 for="${field.id_order_form_detail}">
                                    <b>
                                        ${field.question}
                                        ${field.required ? '<span class="text-danger">*</span>' : ''}
                                    </b>
                                </h5>
                                ${
                                    field.type_form === 'checkbox'
                                    ? `
                                    <div class="checkbox-group" data-min="1">
                                        ${JSON.parse(field.answer).map((option, optionIndex) => `
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="tickets[${ticketIndex}][${field.id_order_form_detail}][]"
                                                    id="ticket_${ticketIndex}_${field.id_order_form_detail}_${optionIndex}"
                                                    value="${option.trim()}">
                                                <label class="form-check-label" for="ticket_${ticketIndex}_${field.id_order_form_detail}_${optionIndex}">
                                                    ${option.trim()}
                                                </label>
                                            </div>
                                        `).join('')}
                                    </div>
                                    `
                                    : field.type_form === 'radio'
                                    ? JSON.parse(field.answer).map((option, optionIndex) => `
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="tickets[${ticketIndex}][${field.id_order_form_detail}]"
                                                id="ticket_${ticketIndex}_${field.id_order_form_detail}_${optionIndex}"
                                                value="${option.trim()}"
                                                ${field.required ? 'required' : ''}>
                                            <label class="form-check-label" for="ticket_${ticketIndex}_${field.id_order_form_detail}_${optionIndex}">
                                                ${option.trim()}
                                            </label>
                                        </div>
                                    `).join('')
                                    : field.type_form === 'select'
                                    ? `
                                    <select class="form-control" id="ticket_${ticketIndex}_${field.id_order_form_detail}"
                                        name="tickets[${ticketIndex}][${field.id_order_form_detail}]" ${field.required ? 'required' : ''}>
                                        <option value="">Select an option</option>
                                        ${field.answer.split(',').map(option => `
                                            <option value="${option.trim()}">${option.trim()}</option>
                                        `).join('')}
                                    </select>
                                    `
                                    : field.type_form === 'text'
                                    ? `
                                    <textarea class="form-control" id="ticket_${ticketIndex}_${field.id_order_form_detail}"
                                        name="tickets[${ticketIndex}][${field.id_order_form_detail}]"
                                        placeholder="Enter ${field.question}" ${field.required ? 'required' : ''}></textarea>
                                    `
                                    : field.type_form === 'file'
                                    ? `
                                    <input type="file" class="form-control" id="ticket_${ticketIndex}_${field.id_order_form_detail}"
                                        name="tickets[${ticketIndex}][${field.id_order_form_detail}]"
                                        accept="${field.answer || '*'}" ${field.required ? 'required' : ''}>
                                    `
                                    : `
                                    <input type="${field.type_form === 'varchar' ? 'text' : field.type_form}" class="form-control"
                                        id="ticket_${ticketIndex}_${field.id_order_form_detail}"
                                        name="tickets[${ticketIndex}][${field.id_order_form_detail}]"
                                        ${field.required ? 'required' : ''}>
                                    `
                                }
                            </div>
                        `).join('')}
                        ${
                            ticketIndex > 0
                                ? '<button type="button" class="btn btn-danger mt-3 delete-ticket">Delete Ticket <i class="fa fa-trash"></i></button>'
                                : ''
                        }
                    </div>
                </div>
            `;
        }

        addTicket();

        addTicketBtn.addEventListener('click', function() {
            const quantity = parseInt(ticketQuantityInput.value);
            if (ticketCount + quantity <= 5) {
                Swal.fire({
                    title: 'Confirm',
                    text: 'Are you sure you want to add more tickets?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, add',
                    cancelButtonText: 'No, cancel',
                    confirmButtonColor: '#e6595f'
                }).then((result) => {
                    if (result.isConfirmed) {
                        for (let i = 0; i < quantity; i++) {
                            addTicket();
                        }
                        ticketQuantityInput.value = 1;
                        Swal.fire({
                            title: 'Success',
                            text: `${quantity} tickets added successfully.`,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#e6595f'
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: 'Limit Reached',
                    text: 'You cannot add more than 5 tickets.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#e6595f'
                });
            }
        });

        ticketForms.addEventListener('change', function(e) {
            if (e.target.classList.contains('same-as-first')) {
                const currentTicket = e.target.closest('.ticket-form');
                const firstTicket = ticketForms.querySelector('.ticket-form');

                if (e.target.checked) {
                    copyTicketData(firstTicket, currentTicket);
                } else {
                    clearTicketData(currentTicket);
                }
            }
        });

        function copyTicketData(sourceTicket, targetTicket) {
            const inputs = sourceTicket.querySelectorAll('input, select, textarea');
            inputs.forEach(sourceInput => {
                const targetInput = targetTicket.querySelector(`[name="${sourceInput.name.replace(/\[\d+\]/, `[${targetTicket.dataset.index}]`)}"]`);
                if (targetInput) {
                    if (sourceInput.type === 'checkbox' || sourceInput.type === 'radio') {
                        targetInput.checked = sourceInput.checked;
                    } else {
                        // Ambil field name di dalam kurung kedua, contoh: tickets[0][first_name] => first_name
                        const match = sourceInput.name.match(/\[(\w+)\]$/);
                        const fieldName = match ? match[1] : null;

                        // Skip kalau field termasuk dalam daftar
                        const blockedNames = ['first_name', 'last_name', 'email', 'phone'];
                        if (!blockedNames.includes(fieldName)) {
                            targetInput.value = sourceInput.value;
                        }
                    }
                }
            });

            const checkboxes = sourceTicket.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(sourceCheckbox => {
                const targetCheckbox = targetTicket.querySelector(`[name="${sourceCheckbox.name.replace(/\[\d+\]/, `[${targetTicket.dataset.index}]`)}"][value="${sourceCheckbox.value}"]`);
                if (targetCheckbox) {
                    targetCheckbox.checked = sourceCheckbox.checked;
                }
            });

            const radios = sourceTicket.querySelectorAll('input[type="radio"]');
            radios.forEach(sourceRadio => {
                const targetRadio = targetTicket.querySelector(`[name="${sourceRadio.name.replace(/\[\d+\]/, `[${targetTicket.dataset.index}]`)}"][value="${sourceRadio.value}"]`);
                if (targetRadio) {
                    targetRadio.checked = sourceRadio.checked;
                }
            });
        }

        function clearTicketData(ticket) {
            const inputs = ['input', 'select', 'textarea'];
            inputs.forEach(inputType => {
                ticket.querySelectorAll(inputType).forEach(input => {
                    if (input.type === 'checkbox' || input.type === 'radio') {
                        input.checked = false;
                    } else {
                        // cek nama field terakhir, contoh: tickets[0][first_name] → first_name
                        const match = input.name ? input.name.match(/\[(\w+)\]$/) : null;
                        const fieldName = match ? match[1] : null;

                        const blockedNames = ['first_name', 'last_name', 'email', 'phone'];
                        if (!blockedNames.includes(fieldName)) {
                            input.value = '';
                        }
                    }
                });
            });
        }

        ticketForms.addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-ticket')) {
                Swal.fire({
                    title: 'Confirm',
                    text: 'Are you sure you want to delete this ticket?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'No, cancel',
                    confirmButtonColor: '#e6595f'
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.closest('.ticket-form').remove();
                        ticketCount--;
                        updateTicketCount();
                        updateTicketNumbers();
                        Swal.fire({
                            title: 'Success',
                            text: 'Ticket deleted successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#e6595f'
                        });
                    }
                });
            }
        });

        function updateTicketCount() {
            ticketCountDisplay.textContent = ticketCount;
        }

        function updateTicketNumbers() {
            ticketForms.querySelectorAll('.ticket-form').forEach((form, index) => {
                form.querySelector('.card-header h5:first-child').textContent = `Ticket #${index + 1}`;
            });
        }
    });

    document.getElementById('registration-form').addEventListener('submit', function(e) {
        e.preventDefault();

        let isValid = true;
        this.querySelectorAll('.checkbox-group[data-min="1"]').forEach(group => {
            if (group.querySelectorAll('input[type="checkbox"]:checked').length === 0) {
                isValid = false;
                Swal.fire({
                    title: 'Something Missing',
                    text: 'Please select at least 1 answer on every required checkbox group.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#e6595f'
                });
            }
        });

        //cek duplikasi data input full name, email, phone
        if (isValid) {
            const tickets = this.querySelectorAll('.ticket-form');
            const nameSet = new Set();
            const emailSet = new Set();
            const phoneSet = new Set();

            for (let ticket of tickets) {
                const firstName = ticket.querySelector('[name*="[first_name]"]').value.trim().toLowerCase();
                const lastName = ticket.querySelector('[name*="[last_name]"]').value.trim().toLowerCase();
                const email = ticket.querySelector('[name*="[email]"]').value.trim().toLowerCase();
                const phone = ticket.querySelector('[name*="[phone]"]').value.trim();

                const fullName = `${firstName} ${lastName}`;

                if (nameSet.has(fullName)) {
                    isValid = false;
                    Swal.fire({
                        title: 'Duplicate Name',
                        text: 'First Name + Last Name must be unique across tickets.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#e6595f'
                    });
                    break;
                }
                if (emailSet.has(email)) {
                    isValid = false;
                    Swal.fire({
                        title: 'Duplicate Email',
                        text: 'Email must be unique across tickets.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#e6595f'
                    });
                    break;
                }
                if (phoneSet.has(phone)) {
                    isValid = false;
                    Swal.fire({
                        title: 'Duplicate Phone',
                        text: 'Phone number must be unique across tickets.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#e6595f'
                    });
                    break;
                }

                nameSet.add(fullName);
                emailSet.add(email);
                phoneSet.add(phone);
            }
        }

        if (isValid) {
            Swal.fire({
                title: 'On Process',
                text: 'Please wait, we process your ticket.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            this.submit();
        }
    });
</script>

@endsection
