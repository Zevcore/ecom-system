<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::to('/css/dashboard.css') }}">
</head>
<body>
    <section class="app">

        <img src="{{ URL::to('/img/kekw2.jpg') }}" alt="macio">

        <h1>Witaj w <b>Ecom-system</b></h1>
        <p class="description">Zapraszamy do zakupu w naszym sklepie! :)</p>

        <section class="creators">
            <p class="desc">Projekt utworzony przez</p>
            @foreach($creators as $key => $creator)
                <div class="creator">
                    <p class="creator-name">{{ $key }}</p>
                    <p class="creator-title">{{ $creator }}</p>
                </div>
                <hr>
            @endforeach
        </section>

        <p class="footer">
            Na zaliczenie przedmiotu <br> <b>Projekt Systemu Informatycznego</b>
        </p>

    </section>
</body>
</html>
