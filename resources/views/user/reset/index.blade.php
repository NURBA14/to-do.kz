<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/compiled/css/auth.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    @include('admin.layouts.error')
                    <h1 class="auth-title">Reset Password</h1>
                    <p class="auth-subtitle mb-5">Create new password</p>
                    <form action="{{ route("password.update") }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="hidden" name="token" value="{{ $request->token }}">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text"
                                    class="form-control form-control-xl @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" value="{{ $request->email }}">
                                <div class="form-control-icon">
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password"
                                    class="form-control form-control-xl @error('password') is-invalid @enderror"
                                    placeholder="Password" name="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password"
                                    class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Confirm Password" name="password_confirmation">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Reset</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
</body>

</html>
