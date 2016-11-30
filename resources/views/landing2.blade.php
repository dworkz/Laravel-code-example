<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<?php

        //     <meta name="format-detection" content="telephone=no" />

?>
    <title>СвойДом</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet" />
    <link href="/assets/landing/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/landing/css/font-awesome.css" rel="stylesheet" />
    <link href="/assets/landing/css/style.css?8" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-3 col-lg-4">
                <img class="img-responsive logo" src="/assets/landing/img/logo.png" alt="СвойДом!" />
            </div>
            <div class="col-xs-12 col-md-9 col-lg-8">
                <div class="header-left-container">
                    <div class="header-phone">
                        <span>{{ config('app.phone') }}</span>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="#section-1">ПРЕИМУЩЕСТВА КВАРТАЛА</a></li>
                                <li><a href="#map">ГЕНПЛАН</a></li>
                                <li><a href="#y-map">РАСПОЛОЖЕНИЕ</a></li>
                                <li><a href="#hauses">ПРОЕКТЫ ДОМОВ</a></li>
                                <li><a href="#footer">КОНТАКТЫ</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <form name="callback1" onsubmit="return false;" class="header-feedback">
        <input name="_token" value="{{ csrf_token() }}" type="hidden" />
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="ИМЯ" />
        </div>
        <div class="form-group">
            <input class="phone form-control" type="text" name="phone" placeholder="ТЕЛЕФОН" />
        </div>
        <input onclick="return checkForm(this)" id="callback1" class="btn btn-primary btn-block" type="submit" value="ПЕРЕЗВОНИТЕ МНЕ" />

        <img class="header-feedback-toggle" src="/assets/landing/img/feedback.png" alt="Перезвоните мне" />
    </form>
</header>

<section id="header">


    <div class="container-fluid">
        <div class="row tr">
            <div id="cloud" class="col-xs-12 col-md-4">
                <div>
                    <h2 class="speech">

                        Квартал «Европа» – территория, где самым ценным является Ваше время за городом.
                        <div></div>
                    </h2>

                </div>
                <div class="triangle triangle-right bg-white"></div>
            </div>
            <div class="col-xs-12 col-md-8 background-cover"></div>
        </div>
    </div>


</section>

<section id="advantages">
    <div class="container-fluid">
        <ul class="advantages-list">
            <li>
                <div class="icon icon-home"></div>
                <div>Добротные<br />материалы</div>
            </li>
            <li>
                <div class="icon icon-okey"></div>
                <div>Чистовая<br />отделка</div>
            </li>
            <li>
                <div class="icon icon-light"></div>
                <div>Коммуникации</div>
            </li>
            <li>
                <div class="icon icon-document"></div>
                <div>Собственность<br />на дом</div>
            </li>
            <li>
                <div class="icon icon-winer"></div>
                <div>Гарантия<br />15 лет</div>
            </li>
        </ul>
    </div>
</section>

<section id="section-1">
    <div class="container-fluid">
        <div class="row tr">
            <div class="col-xs-12 col-md-4 background-cover" style="background-image:url('/assets/landing/img/img-1.png')"></div>

            <div id="h1-box" class="col-xs-12 col-md-4 bg-primary flax-xs">
                <h1 class="big">ПРЕИМУЩЕСТВА КВАРТАЛА</h1>

                <div class="triangle triangle-left bg-primary"></div>
            </div>
            <div class="col-xs-12 col-md-4 last">
                <h1 class="text-primary">Эмоциональные:</h1>

                <ul class="advantages-2-list">
                    <li>Ваш взгляд будет радовать минималистичный аккуратный дизайн интерьеров фасадов и ланшафта</li>
                    <li>Настроение будут поднимать дружелюбные соседи одного с Вами социального статуса</li>
                    <li>Вы будете чувствовать гордость как собственник части самого концептуального и стильного квартала посёлка</li>
                    <li>Отдалённое от центра посёлка расположение квартала позволит Вам насладиться уединением и гармонией с природой</li>
                    <li>Вы и все Ваши гости еще раз убедитесь, что Вы человек умеющий делать правильный выбор</li>
                </ul>

                <div class="triangle triangle-left bg-white"></div>
            </div>

            <div class="up-top up-top-blue"><div></div><span>На верх</span></div>
        </div>
        <div class="row">
            <div class="triangle triangle-top bg-white hidden-xs hidden-sm"></div>

            <h1 class="text-center text-success" style="margin:60px 0 0 0">Рациональные:</h1>
            <div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1">
                <ul class="left-column">
                    <li>
                        <div class="visible-xs-block"><div class="icon icon-rout"></div></div>
                        <span>45 минут езды по самому новому шоссе Подмосковья (8 полос)</span>
                        <div class="hidden-xs"><div class="icon icon-rout"></div></div>
                    </li>
                    <li>
                        <div class="visible-xs-block"><div class="icon icon-tree"></div></div>
                        <span>ландшафный дизайн</span>
                        <div class="hidden-xs"><div class="icon icon-tree"></div></div>
                    </li>
                    <li>
                        <div class="visible-xs-block"><div class="icon icon-star"></div></div>
                        <span>При посадке домов учтены стороны света и движение солнца в течении дня</span>
                        <div class="hidden-xs"><div class="icon icon-star"></div></div>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-5">
                <ul class="right-column">
                    <li>
                        <div><div class="icon icon-home-chear"></div></div>
                        <span>Дома «под мебель». <br /> Остаётся только завезти мебель</span>
                    </li>
                    <li>
                        <div><div class="icon icon-plug"></div></div>
                        <span>Работающие коммуникации</span>
                    </li>
                    <li>
                        <div><div class="icon icon-money"></div></div>
                        <span>Привлекательное ценовое предложение – дешевле чем строить самому. Удаётся достичь за счёт приобретения материалов по оптовым ценам</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="map">
    <div class="container-fluid">
        <div class="row tr">
            <div class="col-xs-12 col-md-8 background-cover" style="background-image:url('/assets/landing/img/hauses.png')">
                @foreach($houses AS $i => $h)
                    <div class="hause-item <?php echo ($h['sold']) ? 'bg-warning' : 'bg-blue'; ?> item-{{ $i +1 }}">
                        №<span>{{ $i +1 }}</span>
                        <div class="item-inf"><span>{!! $h['house'] !!}</span><span>{!! $h['land'] !!}</span>
                            @if( ! $h['sold'])
                                <span>{{ $h['cost'] }} млн. руб</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-xs-12 col-md-4 bg-primary">
                <div class="text-center text-uppercase">
                    <h1 class="big">Генплан</h1>
                    <h4><a target="_blank" href="/assets/landing/img/plan.jpg">Скачать генплан</a><div class="icon icon-pdf"></div></h4>
                </div>

                <ul class="map-history">
                    <li><span class="bg-blue"></span><span>Дом в продаже</span></li>
                    <li><span class="bg-warning"></span><span>Дом продан</span></li>
                </ul>

                <div class="triangle triangle-left bg-primary"></div>
            </div>
        </div>
    </div>

    <div class="up-top up-top-white"><div></div><span>На верх</span></div>
</section>

<section id="hauses">
    <div class="container-fluid">
        <div class="row">

            <div id="house-h1-box" class="col-xs-12 col-md-4 rectangle pull-right">
                <h1 class="big text-primary text-uppercase">Проекты домов и планировки</h1>
            </div>

            <!-- item -->
            <div class="col-xs-12 col-md-4 rectangle hause-img background-cover pull-right" style="background-image:url('/assets/landing/img/h1.jpg')">
                @if($houses[0]['sold'])
                    <div class="house-cost"><span class="sold">ПРОДАН</span></div>
                @else
                    <div class="house-cost"><span>{{ $houses[0]['cost'] }}</span> <span>МЛН. <i class="fa fa-rub" aria-hidden="true"></i></span></div>
                @endif
            </div>

            <div class="col-xs-12 col-md-4 rectangle bg-info hause-inf text-uppercase">
                <div class="no-auto">
                    <h3>{{ $houses[0]['name'] }}</h3>
                    <p>{{ $houses[0]['params'] }}<p>
                    <p>
                        {{ $houses[0]['desc'] }}
                    <ul>
                        @foreach($houses[0]['desc_list'] AS $li)
                            <li>{{ $li }}</li>
                        @endforeach
                    </ul>
                    </p>

                    <p><a target="_blank" href="/house/1">Планировка ДОМА</a></p>

                </div>
                <div class="triangle triangle-right bg-info"></div>
            </div>
            <!-- /item -->

            <!-- item -->
            <div class="col-xs-12 col-md-4 rectangle hause-img background-cover" style="background-image:url('/assets/landing/img/h2.jpg')">
                @if($houses[1]['sold'])
                    <div class="house-cost"><span class="sold">ПРОДАН</span></div>
                @else
                    <div class="house-cost"><span>{{ $houses[1]['cost'] }}</span> <span>МЛН. <i class="fa fa-rub" aria-hidden="true"></i></span></div>
                @endif
            </div>

            <div class="col-xs-12 col-md-4 rectangle hause-inf text-uppercase">
                <div class="no-auto">
                    <h3>{{ $houses[1]['name'] }}</h3>
                    <p>{{ $houses[1]['params'] }}<p>
                    <p>
                    {{ $houses[1]['desc'] }}
                    <ul>
                        @foreach($houses[1]['desc_list'] AS $li)
                            <li>{{ $li }}</li>
                        @endforeach
                    </ul>
                    </p>

                    <p><a target="_blank" href="/house/2">Планировка ДОМА</a></p>

                </div>

                <div class="triangle triangle-left"></div>
            </div>
            <!-- /item -->

            <!-- item -->
            <div class="col-xs-12 col-md-4 rectangle hause-img background-cover" style="background-image:url('/assets/landing/img/h3.jpg')">
                @if($houses[2]['sold'])
                    <div class="house-cost"><span class="sold">ПРОДАН</span></div>
                @else
                    <div class="house-cost"><span>{{ $houses[2]['cost'] }}</span> <span>МЛН. <i class="fa fa-rub" aria-hidden="true"></i></span></div>
                @endif
            </div>

            <div class="col-xs-12 col-md-4 rectangle hause-inf text-uppercase">
                <div class="no-auto">
                    <h3>{{ $houses[2]['name'] }}</h3>
                    <p>{{ $houses[2]['params'] }}<p>
                    <p>
                    {{ $houses[2]['desc'] }}
                    <ul>
                        @foreach($houses[2]['desc_list'] AS $li)
                            <li>{{ $li }}</li>
                        @endforeach
                    </ul>
                    </p>

                    <p><a target="_blank" href="/house/3">Планировка ДОМА</a></p>

                </div>

                <div class="triangle triangle-left"></div>
            </div>
            <!-- /item -->

            <!-- item -->
            <div class="col-xs-12 col-md-4 rectangle hause-img background-cover" style="background-image:url('/assets/landing/img/h4.jpg')">
                @if($houses[3]['sold'])
                    <div class="house-cost"><span class="sold">ПРОДАН</span></div>
                @else
                    <div class="house-cost"><span>{{ $houses[3]['cost'] }}</span> <span>МЛН. <i class="fa fa-rub" aria-hidden="true"></i></span></div>
                @endif
            </div>

            <div class="col-xs-12 col-md-4 rectangle hause-inf text-uppercase">
                <div class="no-auto">
                    <h3>{{ $houses[3]['name'] }}</h3>
                    <p>{{ $houses[3]['params'] }}<p>
                    <p>
                    {{ $houses[3]['desc'] }}
                    <ul>
                        @foreach($houses[3]['desc_list'] AS $li)
                            <li>{{ $li }}</li>
                        @endforeach
                    </ul>
                    </p>

                    <p><a target="_blank" href="/house/4">Планировка ДОМА</a></p>

                </div>

                <div class="triangle triangle-left bg-info"></div>
            </div>
            <!-- /item -->

            <!-- item -->
            <div class="col-xs-12 col-md-4 rectangle hause-img background-cover" style="background-image:url('/assets/landing/img/h5.jpg')">
                @if($houses[4]['sold'])
                    <div class="house-cost"><span class="sold">ПРОДАН</span></div>
                @else
                    <div class="house-cost"><span>{{ $houses[4]['cost'] }}</span> <span>МЛН. <i class="fa fa-rub" aria-hidden="true"></i></span></div>
                @endif
            </div>

            <div class="col-xs-12 col-md-4 rectangle hause-inf text-uppercase">
                <div class="no-auto">
                    <h3>{{ $houses[4]['name'] }}</h3>
                    <p>{{ $houses[4]['params'] }}<p>
                    <p>
                    {{ $houses[4]['desc'] }}
                    <ul>
                        @foreach($houses[4]['desc_list'] AS $li)
                            <li>{{ $li }}</li>
                        @endforeach
                    </ul>
                    </p>

                    <p><a target="_blank" href="/house/5">Планировка ДОМА</a></p>

                </div>

                <div class="triangle triangle-left bg-info"></div>
            </div>
            <!-- /item -->

            <!-- item -->
            <div class="col-xs-12 col-md-4 rectangle hause-img background-cover" style="background-image:url('/assets/landing/img/h6.jpg')">
                @if($houses[5]['sold'])
                    <div class="house-cost"><span class="sold">ПРОДАН</span></div>
                @else
                    <div class="house-cost"><span>{{ $houses[5]['cost'] }}</span> <span>МЛН. <i class="fa fa-rub" aria-hidden="true"></i></span></div>
                @endif
            </div>

            <div class="col-xs-12 col-md-4 rectangle hause-inf text-uppercase">
                <div class="no-auto">
                    <h3>{{ $houses[5]['name'] }}</h3>
                    <p>{{ $houses[5]['params'] }}<p>
                    <p>
                    {{ $houses[5]['desc'] }}
                    <ul>
                        @foreach($houses[5]['desc_list'] AS $li)
                            <li>{{ $li }}</li>
                        @endforeach
                    </ul>
                    </p>

                    <p><a target="_blank" href="/house/6">Планировка ДОМА</a></p>

                </div>

                <div class="triangle triangle-left"></div>
            </div>
            <!-- /item -->

            <div class="col-xs-12 col-md-12 hauses-form">
                <div class="row">
                    <form name="callback2" class="col-xs-12 col-md-10 col-md-offset-2" onsubmit="return false;" method="post">
                        <h1 class="big">Рассказать больше?</h1>

                        <div class="form-group row">
                            <div class="col-xs-12 col-lg-3">Имя</div>
                            <div class="col-xs-12 col-lg-9"><input class="form-control" type="text" name="name" /></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-12 col-lg-3">Телефон</div>
                            <div class="col-xs-12 col-lg-9"><input class="form-control" type="text" name="phone" /></div>
                        </div>

                        <div class="row tr">
                            <div class="col-xs-12">
                                <input onclick="return checkForm(this)" id="callback2" type="submit" value="Перезвоните мне" />
                            </div>
                        </div>
                    </form>
                </div>
                @if(isset($totalCall[date('H')]))
                    <div class="calling">
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <h2>Сегодня позвонил<span class="h1">{{ $totalCall[date('H')] }}</span>человек.</h2>
                        </div>
                    </div>
                @endif
                <div class="free-hauses">
                    <div class="col-xs-12 col-md-8  col-md-offset-2">
                        <h2>Осталось<span class="h1">4</span>дома</h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section id="blue-line">
    <div class="container-fluid">
        <h2>Новое шоссе – 45 минут от МКАД</h2>
    </div>
</section>


<section id="y-map-container">
    <div id="yandex_map" style="width: 100%; height: 400px"></div>
</section>

<footer id="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9 col-md-offset-1">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-1">
                        <ul class="social">
                            <li><a href="#" class="icon icon-instagram"></a></li>
                            <li><a href="#" class="icon icon-vk"></a></li>
                            <li><a href="#" class="icon icon-fb"></a></li>
                            <li><a href="#" class="icon icon-twitter"></a></li>
                        </ul>

                        <ul class="footer-navbar">
                            <li><a href="#section-1">ПРЕИМУЩЕСТВА КВАРТАЛА</a></li>
                            <li><a href="#map">ГЕНПЛАН</a></li>
                            <li><a href="#y-map">РАСПОЛОЖЕНИЕ</a></li>
                            <li><a href="#hauses">ПРОЕКТЫ ДОМОВ</a></li>
                            <li><a href="#footer">КОНТАКТЫ</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="address">
                            Г. МОСКВА<br />
                            Пр-кт Андропова д.22<br />
                            БЦ "Нагатинский"<br />
                            <br />
                            E-MAIL: <a href="mailto:info@sdom.ru">info@sdom.ru</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-md-offset-1">
                        <img class="img-responsive center-block" src="/assets/landing/img/logo-inverse.png" alt="СвойДом" />
                        <p class="office-inf">
                            ОФИС ПРОДАЖ<br />
                            С 09.00 ДО 21.00
                        </p>
                        <p class="footer-phone"><span>{{ config('app.phone') }}</span></p>
                    </div>
                </div>
            </div>

            <div class="up-top up-top-primary"><div></div><span>На верх</span></div>
        </div>
    </div>
    <div class="container-fluid copy">
        <div class="row">
            <div class="col-xs-12 col-md-9 col-md-offset-1">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-1">
                        СВОЙ ДОМ &copy; 2016
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
<script src="/assets/landing/js/common.js"></script>
<script type="text/javascript">
    $Maps = [];
    ymaps.ready(function() {
        $Maps['yandex_map'] = new ymaps.Map('yandex_map', {"center":["55.153923","37.62649"],"zoom":10,"behaviors":["default"],"type":"yandex#map"}, {"minZoom":5,"maxZoom":15});

        $Maps['yandex_map'].geoObjects.add(new ymaps.Placemark(["55.153923","37.62649"], {"iconContent":"Соколиная гора"}, {"preset":"twirl#whiteStretchyIcon"}))
        ;

        $Maps['yandex_map'].controls
                .add(new ymaps.control.SmallZoomControl())
                .add(new ymaps.control.TypeSelector(['yandex#map', 'yandex#satellite']));
    });

    function checkForm(field)
    {
        var formName = field.id;

        var elements = document.forms['' + formName + ''];

        if( ! elements.phone.value)
        {
            alert("Вы не оставили свой телефон.");
            return false;
        }
        else
        {
           sendData(elements);
        }
    };

    function sendData(elems)
    {
        var xhr = new XMLHttpRequest();
        var formData = new FormData(elems);

        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                alert(xhr.responseText);
            }
        }

        xhr.open("POST", "/callback/form", true);
        xhr.send(formData);

        return false;
    };


</script>
</body>
</html>