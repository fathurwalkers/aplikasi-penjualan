<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/css/my-login.css">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="{{ asset('auth') }}/img/logo.jpg" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body">

                            <h5 class="text-center">Daftar Akun</h5>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    @if (session('status'))
                                        <div class="alert alert-info">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('post-register') }}" method="POST">
                                @csrf

                                <hr />
                                <div class="form-group">
                                    <label for="login_nama">Nama Lengkap</label>
                                    <input name="login_nama" id="login_nama" type="text" class="form-control"
                                        value="{{ old('login_nama') }}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="login_email">Email</label>
                                    <input name="login_email" id="login_email" type="email"
                                        value="{{ old('login_email') }}" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="login_telepon">No. Telepon / HP</label>
                                    <input name="login_telepon" id="login_telepon" type="text" class="form-control"
                                        value="{{ old('login_telepon') }}" required>
                                </div>

                                <hr />

                                <div class="form-group">
                                    <label for="login_username">Username</label>
                                    <input name="login_username" id="login_username" type="text" class="form-control"
                                        value="{{ old('login_username') }}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label for="login_password">Password</label>
                                    <input name="login_password" id="login_password" type="password"
                                        class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="login_password2">Konfirmasi Password</label>
                                    <input name="login_password2" id="login_password2" type="password"
                                        class="form-control" required>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Daftar Akun
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Sudah punya Akun? <a href="{{ route('login') }}">Login sekarang!</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('auth') }}/js/my-login.js"></script>
</body>

</html>
