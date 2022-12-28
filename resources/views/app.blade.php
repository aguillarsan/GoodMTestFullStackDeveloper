<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta description="Test Resolution FullStack Developer Good Meal">
    <meta charset="utf-8" content="{{ csrf_token()}}" name="csrf-token">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet"  href="{{asset('css/app.css')}}"></link>
    <link rel="shortcut icon"
        href="https://static.wixstatic.com/media/a50040_ed3301dfdc65469385eedd6ddab5bf8c%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/a50040_ed3301dfdc65469385eedd6ddab5bf8c%7Emv2.png"
        type="image/png">
    <title>Good Meal</title>
</head>

<body>
    <div id="app">
        <router-view></router-view>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>