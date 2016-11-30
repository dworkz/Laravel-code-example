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

<header>
    <div class="logo-container">
        <img class="logo" src="/assets/landing/img/logo.png" alt="СвойДом!" />
        <div class="header-phone">
            <span>{{ config('app.phone') }}</span>
        </div>
    </div>
    <a class="btn-back" href="/"><i class="fa fa-angle-left"></i><span>на главную</span></a>
</header>

<div class="img-container">
    <div class="back-img">
        <img src="/assets/landing/img/{{ $house['back_img'] }}" alt="" />
    </div>
    <div class="front-img">
        <img src="/assets/landing/img/{{ $house['front_img'] }}" alt="" />
    </div>
</div>


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


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(window).load(function()
    {
        $('.front-img img').height($('.back-img img').height()).css('margin-left', $('.back-img img').css('margin-left'));


console.log($('.back-img img').height());


        var $front_img = $('.front-img');



        $(document).mousemove(function(e){

            $front_img.width(e.pageX + 'px');

        });



        document.addEventListener('touchmove', function(e) {

            e.preventDefault();

            var touch = e.touches[0];

            $front_img.width(touch.pageX + 'px');

        }, false);



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