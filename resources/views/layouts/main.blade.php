<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="">
    <title>クイズ作れる君</title>
    <meta name="desctiption" content="自分でクイズを作り、問題を解答して遊べるクイズアプリです。">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--CSS-->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <link rel="stylesheet" href="/css/sp.css">
    <link rel="stylesheet" href="/css/tb.css">
    <link rel="stylesheet" href="/css/pc.css">
  </head>
  <body class="preload">
    @yield('contents')

    <!--JavaScript-->
    <script src="https://kit.fontawesome.com/13512ea588.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/script.js"></script>
  </body>
</html>