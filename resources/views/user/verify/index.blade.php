<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/error.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-error" src="{{ asset('/assets/compiled/svg/error-500.svg') }}" alt="System Error">
                    @include('worker.layouts.success')
                    <div class="alert alert-warning"><i class="bi bi-exclamation-triangle"></i> Verify Your Email</div>
                    <a href="{{ route('guest.home') }}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a>
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button class="mt-4 btn btn-outline-primary" type="submit">Recend Verifycation Email</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
</body>

</html>
