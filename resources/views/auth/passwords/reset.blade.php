<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap connection -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/custom.css">
    <title>Bantenese Furniture : Reset Password</title>

    <style>
        .rounded-pill {
            color: white;
        }

        .alert {
            width: 50%;
        }

    </style>
</head>

<body>

    <div class="imagebg">
        <div class="container mt-n5" style="margin-top: -30vh !important;">
            <div class="d-flex justify-content-center mb-5">
                <div class="d-flex align-items-center">
                    <div class="col-sm-4 col-md-4 mt-4">
                        <a href="/">
                            <img src="../../../assets/icon/Icon Funiture.jpeg" alt="Furniture" class="rounded-circle" width="150vw;">
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <div class="container justify-content-center mb-5">
                    <h4 class="h1 text-center" style="font-weight: 500;">RESET PASSWORD</h4>
                </div>

                @if ($errors->any())
                <center>
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }},
                        @endforeach
                    </div>
                </center>
                @endif

                <div class="d-flex justify-content-center">
                    <form method="post" action="{{ route('password.update') }}" class="col-md-6">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukkan Password Baru">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Konfirmasi</label>
                            <div class="col-sm-10">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn rounded-pill btn-lg">Reset Password</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
