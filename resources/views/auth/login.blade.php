<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from rn53themes.net/themes/demo/education-master/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 May 2023 07:07:44 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Sign In | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('asset1/images/favicon.ico')}}">

    <!-- Layout config Js -->
    <script src="{{asset('assets1/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('assets1/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets1/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets1/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('assets1/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets1/plugins/toastr.min.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="index.html" class="d-block">
                                                    <img src="{{asset('assets1/images/logo-light.png')}}" alt="" height="18">
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="0" class="active" aria-current="true"
                                                            aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean
                                                                design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" The theme is really great with
                                                                an amazing customer support."</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15 fst-italic">" Great! Clean code, clean
                                                                design, easy for customization. Thanks very much! "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end carousel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to continue to Velzon.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form action="{{route('dashboard')}}" id="login_form" method="post">
                                                @csrf

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Enter email" name="email_address">
                                                        <span class="text-danger errrors"></span>
                                                
                                                </div>

                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="auth-pass-reset-cover.html" class="text-muted">Forgot
                                                            password?</a>
                                                    </div>
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" name="password" class="form-control pe-5 password-input"
                                                            placeholder="Enter password" id="password-input">
                                                        <button
                                                            class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                            type="button" id="password-addon"><i
                                                                class="ri-eye-fill align-middle"></i></button>
                                                                <span class="text-danger errrors"></span>

                                                    </div>
                                                  
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="auth-remember-check">
                                                    <label class="form-check-label" for="auth-remember-check">Remember
                                                        me</label>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Sign In</button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                                    </div>

                                                    <div>
                                                        <button type="button"
                                                            class="btn btn-primary btn-icon waves-effect waves-light"><i
                                                                class="ri-facebook-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-danger btn-icon waves-effect waves-light"><i
                                                                class="ri-google-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-dark btn-icon waves-effect waves-light"><i
                                                                class="ri-github-fill fs-16"></i></button>
                                                        <button type="button"
                                                            class="btn btn-info btn-icon waves-effect waves-light"><i
                                                                class="ri-twitter-fill fs-16"></i></button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Don't have an account ? <a href="{{route('signup')}}"
                                                    class="fw-semibold text-primary text-decoration-underline">
                                                    Signup</a> </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>document.write(new Date().getFullYear())</script> Velzon. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!--Import jQuery before materialize.js-->
  <!-- JAVASCRIPT -->
  <script src="{{asset('assets1/plugins/toastr.min.js')}}"></script>
    <script src="{{asset('assets1/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets1/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets1/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('assets1/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets1/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('assets1/js/plugins.js')}}"></script>
    

    <script>
      $(function(){
        $("#login_form").on('submit', function(event) {
            event.preventDefault()

$(".errors").empty()
$.ajax({
    type: "POST",
    url: "{{route('userLogin')}}",
    data: $(this).serialize(),
    success: function(response) {
        if (response.status) {
            $(".errors").empty()

            // user created
            // alert(response.msg)
            toastr.options.timeOut = 10000;
            toastr.success(response.msg);
            location.href = "{{route('dashboard')}}";

        } else {
            $(".errors").empty()

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
    </script>
</body>


<!-- Mirrored from rn53themes.net/themes/demo/education-master/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 May 2023 07:07:44 GMT -->
</html>