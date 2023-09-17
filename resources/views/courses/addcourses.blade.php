@extends('master')  
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Courses Details</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Add Courses</h4>
                                <div class="flex-shrink-0">

                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="live-preview">
                                    <form id="post_courses" method="post" action="{{route('saveCourses')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="streaminput" class="form-label">Stream</label>
                                                    <input type="text" class="form-control" name="stream"
                                                        placeholder="Enter your StreamName" id="streaminput">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="courseNameinput" class="form-label"> Courses Name</label>
                                                    <input type="text" class="form-control" name="courses_name"
                                                        placeholder="Enter your coursesname" id="courseNameinput">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="coursesId" class="form-label">Course ID</label>
                                                    <input type="text" class="form-control" name="courses_ID"
                                                        placeholder="Enter your Courses ID" id="coursesId">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="creditHoursinput" class="form-label">Credit Hours</label>
                                                    <input type="text" class="form-control" name="credithours"
                                                        placeholder="Enter Credit Hours" id="creditHoursinput">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="durationInput" class="form-label"></label>Duration
                                                    <input type="text" class="form-control" name="duration"
                                                        placeholder="6 hours" id="durationInput">
                                                    <span class="text-danger errrors"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="address1ControlTextarea" class="form-label">Profile Image</label>
                                                    <input type="file" class="form-control" name="featured_image"
                                                        placeholder="Place your image" id="address1ControlTextarea">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
    <script>
        $(function() {
            $("#post_courses").on('submit', function(event) {
                event.preventDefault()
                var formData = new FormData(this);
                $(".errors").empty()
                $.ajax({
                    type: "POST",
                    url: "{{ route('saveCourses') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            toastr.options.timeOut = 10000;
                            toastr.success(response.msg);

                            location.href = "{{route('dashboard')}}";

                        } else {
                            toastr.options = {
                                "closeButton": true,
                                "progressBar": true
                            };
                            toastr.error(response.msg);
                            const errors = response.result

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
    </script>
@endsection
