@extends('master')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Student Details</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1  ">Add Student</h4>
                                <div class="flex-shrink-0">

                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="live-preview">
                                    <form id="updateStudent" method="post" action="{{ route('updateStudent') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $editStudent->id }}" name="id">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="firstname"
                                                        placeholder="Enter your firstname" id="firstNameinput"
                                                        value="{{ $editStudent->first_name }}">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="lastNameinput" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="lastname"
                                                        placeholder="Enter your lastname" id="lastNameinput"
                                                        value="{{ $editStudent->last_name }}">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Student ID</label>
                                                    <input type="text" class="form-control" name="student_ID"
                                                        placeholder="Enter your student ID" id="firstNameinput"
                                                        value="{{ $editStudent->student_ID }}">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="compnayNameinput" class="form-label">College Name</label>
                                                    <input type="text" class="form-control" name="college_name"
                                                        placeholder="Enter College name" id="compnayNameinput"
                                                        value="{{ $editStudent->college_name }}">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" name="phone_number"
                                                        placeholder="+(977) 451 45123" id="phonenumberInput"
                                                        value="{{ $editStudent->phone_number }}">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" name="email_address"
                                                        placeholder="example@gamil.com" id="emailidInput"
                                                        value="{{ $editStudent->email_address }}">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address"
                                                        placeholder="Address" value="{{ $editStudent->address }}">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="address1ControlTextarea" class="form-label">Profile
                                                        Image</label>
                                                    <input type="file" class="form-control" name="featured_image"
                                                        placeholder="Place your image" id="address1ControlTextarea">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="address1ControlTextarea" class="form-label">Profile
                                                        Image</label>
                                                    <img style="height: 80px;"
                                                        src="{{ asset($editStudent->featured_image) }}"
                                                        alt="{{ $editStudent->first_name }}" loading="lazy">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- container-fluid -->
    </div>
    <link rel="stylesheet" href="{{ asset('assets1/plugins/toastr.min.css') }}">
    <script>
        $(function() {
        $("#updateStudent").on('submit', function(event) {
            event.preventDefault()
            var formData = new FormData(this);
            $(".errors").empty()
            $.ajax({
                type: "POST",
                url: "{{ route('updateStudent') }}",
                data: formData,
                processData: false,
                contentType: false,

                success: function(response) {
                    if (response.status) {


                        // alert(response.msg)
                        toastr.options.timeOut = 10000;
                        toastr.success(response.msg);

                        location.href = "{{ route('viewstudent') }}";

                    } else {
                        // alert(response.msg)

                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        };
                        toastr.error(response.msg);
                        const errors = response.result
                        console.log(errors)

                        $.each(errors, function(key, value) {
                            $('[name="' + key + '"]').addClass('is-invalid').next()
                                .html(value[0])
                        })
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            })

        })
        })
        })
    </script>
@endsection
