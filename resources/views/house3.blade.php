
<!DOCTYPE html>
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>СвойДом</title>

    <link href="/assets/landing/css/bootstrap.css" rel="stylesheet">
    <link href="/assets/landing/css/font-awesome.css" rel="stylesheet">
    <link href="/assets/landing/css/house3.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>





<header>
    <div class="logo-container">
        <img class="logo" src="/assets/landing/img/logo.png" alt="СвойДом!">
        <div class="header-phone">
            <span>{{ config('app.phone') }}</span>
        </div>
    </div>
    <a class="btn-back" href="/"><span>на главную</span></a>
</header>
<div class="ab-wrap">
    <div class="img-container" id="ab-sl" >
        <div class="back-img">
            <img src="/assets/landing/img/{{ $house['back_img'] }}" alt="" />
        </div>
        <div class="front-img" >
            <img src="/assets/landing/img/{{ $house['front_img'] }}" alt="" />
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




</div>
<div class="k-bg"></div>
<script src="/assets/landing/js/jquery-1.12.4.js"></script>
<script src="/assets/landing/js/bootstrap.min.js"></script>
<script>


    $(window).load(function()
    {
        var $rightPart = $('.front-img');
        function resizer() {
            $('.front-img img, .back-img img').width(parseInt($('#ab-sl').css("width")) - parseInt($('#ab-sl').css("padding-left"))*2);
            $('#ab-sl').height($('.back-img img').height());
            setTimeout(function(){
                $('.k-bg').height($('#ab-sl').height()*1.25);
            },100);
        }

        function mouseMove(e) {
            if(event.target.className == 'img-container') {
                xOffset = (e.offsetX || e.clientX - $rightPart.offset().left);
                $rightPart.width(xOffset-parseInt($(event.target).css("padding-left")));
            } else {
                xOffset = (e.offsetX || e.clientX - $rightPart.offset().left);
                $rightPart.width(xOffset);
            }
        }

        var img_width = $('.front-img img').width();
        var initWidth = img_width/2;
        var xOffset;

        resizer();
        $rightPart.width(initWidth);

        $(window).resize(function(){
            resizer();
        });

        $('.img-container, .k-bg').mousemove(function(e){
            $('.k-bg').width(e.pageX);
        });

        $('.img-container').mousemove(mouseMove);

        document.getElementById('ab-sl').addEventListener('touchstart', function(event){
            event.preventDefault();
            var touch = event.touches[0];
            $rightPart.width(touch.pageX-$rightPart.offset().left);
        });
        $('#ab-sl').on("touchmove", function(event){
            event.preventDefault();
            var touch = event.touches[0];
            $rightPart.width(touch.pageX-$rightPart.offset().left);
        });

        setTimeout(function(){
            $('.preloader').animate({
                opacity: 0
            }, 500, function(){
                $(this).remove();
            });
        }, 2000);
    });
</script>


</body></html>