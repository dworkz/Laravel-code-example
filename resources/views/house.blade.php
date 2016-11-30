
<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
<?php
    // <meta name="format-detection" content="telephone=no" />
?>
    <title>СвойДом</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet" />
    <link href="/assets/landing/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/landing/css/font-awesome.css" rel="stylesheet" />
    <link href="/assets/landing/css/house.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>



<div class="preloader">

    <div>

        <img class="logo" src="/assets/landing/img/logo.png" alt="СвойДом!" />

        <div class="text-load">Загрузка...</div>

    </div>

</div>

<div class="row">
    <div class="col-xs-12">

        <div class="logo-container" style="margin: 10px 0 0 30px;">
            <img class="logo" src="/assets/landing/img/logo.png" alt="СвойДом!" />
            <div class="header-phone">
                <span>{{ config('app.phone') }}</span>
            </div>
        </div>
        <div>
            <a class="btn-back" href="/"><i class="fa fa-angle-left"></i><span>на главную</span></a>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-xs-12">

            <img src="/assets/landing/img/{{ $house['front_img'] }}" class="img-responsive">

    </div>
</div>



<?php

/*
         <div class="info">
            <h3>{{ $house['name'] }}</h3>
            <h4>{{ $house['params'] }}</h4>

            @if( ! $house['sold'])
                <h4>{{ $house['cost'] }} млн. руб</h4>
            @endif
            <p>{{ $house['desc'] }}</p>
            @if(count($house['desc_list'] > 0))
                <ul>
                    @foreach($house['desc_list'] AS $li)
                        <li>{{ $li }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
*/

?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

    $(window).load(function(){

        setTimeout(function(){

            $('.preloader').animate({

                opacity: 0

            }, 500, function(){

                $(this).remove();

            });

        }, 2000);



    });

</script>

</body>
</html>