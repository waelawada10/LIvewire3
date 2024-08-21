@extends('laravel.layout')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div>
    <div class="container">
        <form id="myAjax" method="POST">
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">first name</label>
                <input type="text" id="first_name" class="form-control removeBorder" name="first_name">
                <span class="text-danger removeError" id="first_name_error"></span>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">last name</label>
                <input type="text" id="last_name" class="form-control removeBorder" name="last_name">
                <span class="text-danger removeError" id="last_name_error"></span>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of birth</label>
                <input type="date" id="dob" class="form-control removeBorder" name="dob">
                <span class="text-danger removeError" id="dob_error"></span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="text" id="email" class="form-control removeBorder" name="email">
                <span class="text-danger removeError" id="email_error"></span>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">phone</label>
                <input type="text" id="phone" class="form-control removeBorder" name="phone" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                <span class="text-danger removeError" id="phone_error"></span>
            </div>


            <button id="submit-button" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>
    function disableSubmitButton() {
        $('#submit-button').prop('disabled', true);
        $('#submit-button').text('Loading...');
    }

    function enableSubmitButton() {
        $('#submit-button').prop('disabled', false).text('Submit Form');
    }

    function scrollToFirstError() {
        const firstErrorElement = $('.border-danger').first();
        if (firstErrorElement.length) {
            $('html, body').animate({
                scrollTop: firstErrorElement.offset().top - 130
            }, 500);
        }
    }

    function clearPreviousErrors() {
        $('.removeBorder').removeClass('border border-danger');
        $('.removeError').html('');
    }

    $(document).ready(function() {


        $('#myAjax').on('submit', function(e) {

            e.preventDefault();
            disableSubmitButton();
            clearPreviousErrors();
            $.ajax({
                
                url: '{{ route('submitForm') }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: "Good job!",
                        text: response.success,
                        icon: "success",
                        confirmButtonColor: "#198754",
                    }).then(() => {
                        window.location.href = "{{ route('myAjax') }}";
                    });
                },
                error: function(xhr) {
                    
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    console.log(errors);
                    for (const key in errors) {
                        console.log("Key:" + key , "Value:" + errors[key]);
                        console.log(errors[key]);
                        $('#' + key + '_error').html(errors[key]);
                        $('#' + key).addClass('border border-danger');
                        // errorMessage = errorMessage + errors[key].join(', ') + '<br>';
                    }

                    scrollToFirstError()
                    enableSubmitButton()

                }
            });
        });
    });
</script>


@endsection