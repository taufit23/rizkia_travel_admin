<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LOGIN |Rizkia Tour & Travel|</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/vendors/iconfonts/mdi/css/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.addons.css') }}" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/css/shared/style.css') }}" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('/css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('/image/logo_saja.png') }}" />
    <style>
        .backgroundlogin {
            background-image: url("{{ asset('image/forbg2.jpg') }}") !important;
        }

    </style>
</head>

<body>
    <div class="authentication-theme auth-style_1 backgroundlogin">
        <div class="row">
            <div class="col-12">
                <a href="/" class="logo">
                    <img src="{{ asset('/image/logo_saja.png') }} " alt="logo" style="width: 120px" />
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
                <div class="row">
                    <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                        <form action="/postlogin" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control p_input" placeholder="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="bg-danger text-light mt-1">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control p_input"
                                    placeholder="Password">
                                @error('password')
                                    <span class="bg-danger text-light mt-1">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"> Login </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
