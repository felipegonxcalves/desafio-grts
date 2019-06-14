<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - GRTS Digital</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>

<section style="background: #5c8f96;">
    @section('sidebar')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center" style="color: white">CLIENTES</h1>
                </div>
            </div>
        </div>
    @show
</section>

<section class="container">
    @yield('content')
</section>

{{--<section style="background: #c0c0c0; position:fixed; bottom:0; border-top: 1px solid #333; width: 100%;">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <h3 class="text-center">&copy; GRTS Digital - Todos os direitos reservados</h3>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<section class="javascript">
    @yield('javascript')
</section>

</body>
</html>