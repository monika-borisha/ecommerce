<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce:: Admin Panel</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('admin-assets/css/adminlte.min.css') }}>
    <link rel="stylesheet" href={{ asset('admin-assets/css/custom.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.css"
        integrity="sha512-Gebe6n4xsNr0dWAiRsMbjWOYe1PPVar2zBKIyeUQKPeafXZ61sjU2XCW66JxIPbDdEH3oQspEoWX8PQRhaKyBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
     #login.loading {
            pointer-events: none;
            position: relative;
        }

        #login.loading .spinner-border {
            display: inline-block;
            width: 1rem;
            height: 1rem;
            border-width: 0.15em;
            margin-left: 10px;
        }

    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h3">Admin Panel</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form id="loginForm" action="{{ route('admin.authenticate') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div id='loader'></div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" id="login" class="btn btn-primary btn-block">Login
                                <span class="spinner-border spinner-border-sm d-none"></span>
                            </button>
                        </div>
                    </div>
                </form>
                <p class="mb-1 mt-3">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
        </div>
    </div>

    <!-- ./wrapper -->

    <script src={{ asset('admin-assets/plugins/jquery/jquery.min.js') }}></script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('admin-assets/js/adminlte.min.js') }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.min.js"
        integrity="sha512-w4LAuDSf1hC+8OvGX+CKTcXpW4rQdfmdD8prHuprvKv3MPhXH9LonXX9N2y1WEl2u3ZuUSumlNYHOlxkS/XEHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('error'))
        <script>
            swal.fire({
                title: "Login Failed",
                text: "{{ Session::get('error') }}",
                icon: "error",
                button: "Ok",
            })
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            swal.fire({
                title: "Login Successful",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "Ok",
                timer: 3000
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = "{{ route('admin.dashboard') }}";
                }
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function() {
                var $loginBtn = $('#login');
                $loginBtn.addClass('loading'); // Add the loading class to style the button
                $loginBtn.find('.spinner-border').removeClass('d-none'); // Show the spinner
                $loginBtn.prop('disabled', true); // Disable the login button
            });
        });
    </script>


</body>

</html>
