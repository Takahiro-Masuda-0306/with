<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>With</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}">
    </head>

    <body class="bg-light text-wrap">

        @include('commons.navbar')
        
        <div class="container">
            @include('commons.flash_success')
            @include('commons.flash_danger')
            @include('commons.error_messages')
            
            @yield('content')
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="{{ secure_asset('js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ secure_asset('js/main.js') }}"></script>
    </body>
</html>