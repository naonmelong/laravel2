<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    {{--Nav--}}
    @include('layouts.nav')
    {{--End Nav--}}

    @yield('konten')//memberikan ruang kosong yang bisa diisi oleh section

    <footer>Latihan Blade Templating</footer>

</body>
</html>