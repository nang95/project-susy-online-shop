<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/web/bootstrap.min.css') }}">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .auth-wrapper{
            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .auth-card{
            width: 100%;
            min-height: 360px;
            background: white;
            border: 1px solid rgb(245, 245, 245);
            box-shadow:
                0 2.8px 2.2px rgba(0, 0, 0, 0.034),
                0 6.7px 5.3px rgba(0, 0, 0, 0.048),
                0 12.5px 10px rgba(0, 0, 0, 0.06),
                0 22.3px 17.9px rgba(0, 0, 0, 0.072),
                0 41.8px 33.4px rgba(0, 0, 0, 0.086),
                0 100px 80px rgba(0, 0, 0, 0.12);
            border-radius: 5px;
        }
        .auth-card-title{
            font-weight: bold;
            font-size: 20px;
            display: flex;
            width: 100%;
            height: 60px;
            align-items: center;
            justify-content: center;
            text-transform: uppercase;
        }
        .auth-card-body{
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="auth-wrapper" style="background: url('{{ asset('/img/bg-auth.png') }}')">
        @yield('content')
    </div>         

    <script src="{{ asset('js/web/bootstrap.min.js') }}"></script>
</body>
</html>