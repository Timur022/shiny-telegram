<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>НИТ</title>
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
  </head>
  <body>
   
    <?php
    include 'header.php';
    include 'branding.php';
    $active1 = '>';
    $active2 = '>';
    $active3 = '>';
    $active4 = '>';
    $active5 = ' class="active">';
    $active6 = '>';
    include 'mainmenu.php'; ?>
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Корзина покупок</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">

                            <form enctype="multipart/form-data" action="" class="checkout" method="post" name="checkout">
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Платёжные реквизиты</h3>
                                            <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                <label class="" for="billing_country">Страна <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                                    <option value="">Выберите страну…</option>
                                                    <option value="AX">Аландские острова</option>
                                                    <option value="AF">Афганистан</option>
                                                    <option value="AL">Албания</option>
                                                    <option value="DZ">Алжир</option>
                                                    <option value="AD">Андорра</option>
                                                    <option value="AO">Ангола</option>
                                                    <option value="AI">Ангилья</option>
                                                    <option value="AQ">Антарктида</option>
                                                    <option value="AG">Антигуа и Барбуда</option>
                                                    <option value="AR">Аргентина</option>
                                                    <option value="AM">Армения</option>
                                                    <option value="AW">Аруба</option>
                                                    <option value="AU">Австралия</option>
                                                    <option value="AT">Австрия</option>
                                                    <option value="AZ">Азербайджан</option>
                                                    <option value="BS">Багамы</option>
                                                    <option value="BH">Бахрейн</option>
                                                    <option value="BD">Бангладеш</option>
                                                    <option value="BB">Барбадос</option>
                                                    <option value="BY">Беларусь</option>
                                                    <option value="PW">Белау</option>
                                                    <option value="BE">Бельгия</option>
                                                    <option value="BZ">Белиз</option>
                                                    <option value="BJ">Бенин</option>
                                                    <option value="BM">Бермуды</option>
                                                    <option value="BT">Бутан</option>
                                                    <option value="BO">Боливия</option>
                                                    <option value="BQ">Бонайре, Сент-Эстатиус и Саба</option>
                                                    <option value="BA">Босния и Герцеговина</option>
                                                    <option value="BW">Ботсвана</option>
                                                    <option value="BV">Остров Буве</option>
                                                    <option value="BR">Бразилия</option>
                                                    <option value="IO">Британская территория Индийского океана</option>
                                                    <option value="VG">Британские Виргинские острова</option>
                                                    <option value="BN">Бруней</option>
                                                    <option value="BG">Болгария</option>
                                                    <option value="BF">Буркина-Фасо</option>
                                                    <option value="BI">Бурунди</option>
                                                    <option value="KH">Камбоджа</option>
                                                    <option value="CM">Камерун</option>
                                                    <option value="CA">Канада</option>
                                                    <option value="CV">Кабо-Верде</option>
                                                    <option value="KY">Каймановы острова</option>
                                                    <option value="CF">Центрально-Африканская Республика</option>
                                                    <option value="TD">Чад</option>
                                                    <option value="CL">Чили</option>
                                                    <option value="CN">Китай</option>
                                                    <option value="CX">Остров Рождества</option>
                                                    <option value="CC">Кокосовые (Килинг) острова</option>
                                                    <option value="CO">Колумбия</option>
                                                    <option value="KM">Коморы</option>
                                                    <option value="CG">Конго (Браззавиль)</option>
                                                    <option value="CD">Конго (Киншаса)</option>
                                                    <option value="CK">Острова Кука</option>
                                                    <option value="CR">Коста-Рика</option>
                                                    <option value="HR">Хорватия</option>
                                                    <option value="CU">Куба</option>
                                                    <option value="CW">Кюрасао</option>
                                                    <option value="CY">Кипр</option>
                                                    <option value="CZ">Чешская Республика</option>
                                                    <option value="DK">Дания</option>
                                                    <option value="DJ">Джибути</option>
                                                    <option value="DM">Доминика</option>
                                                    <option value="DO">Доминиканская Республика</option>
                                                    <option value="EC">Эквадор</option>
                                                    <option value="EG">Египет</option>
                                                    <option value="SV">Сальвадор</option>
                                                    <option value="GQ">Экваториальная Гвинея</option>
                                                    <option value="ER">Эритрея</option>
                                                    <option value="EE">Эстония</option>
                                                    <option value="ET">Эфиопия</option>
                                                    <option value="FK">Фолклендские острова</option>
                                                    <option value="FO">Фарерские острова</option>
                                                    <option value="FJ">Фиджи</option>
                                                    <option value="FI">Финляндия</option>
                                                    <option value="FR">Франция</option>
                                                    <option value="GF">Французская Гвиана</option>
                                                    <option value="PF">Французская Полинезия</option>
                                                    <option value="TF">Южные Французские Территории</option>
                                                    <option value="GA">Габон</option>
                                                    <option value="GM">Гамбия</option>
                                                    <option value="GE">Грузия</option>
                                                    <option value="DE">Германия</option>
                                                    <option value="GH">Гана</option>
                                                    <option value="GI">Гибралтар</option>
                                                    <option value="GR">Греция</option>
                                                    <option value="GL">Гренландия</option>
                                                    <option value="GD">Гренада</option>
                                                    <option value="GP">Гваделупа</option>
                                                    <option value="GT">Гватемала</option>
                                                    <option value="GG">Гернси</option>
                                                    <option value="GN">Гвинея</option>
                                                    <option value="GW">Гвинея-Бисау</option>
                                                    <option value="GY">Гайана</option>
                                                    <option value="HT">Гаити</option>
                                                    <option value="HM">Остров Херд и острова Макдональдс</option>
                                                    <option value="HN">Гондурас</option>
                                                    <option value="HK">Гонконг</option>
                                                    <option value="HU">Венгрия</option>
                                                    <option value="IS">Исландия</option>
                                                    <option value="IN">Индия</option>
                                                    <option value="ID">Индонезия</option>
                                                    <option value="IR">Иран</option>
                                                    <option value="IQ">Ирак</option>
                                                    <option value="IM">Остров Мэн</option>
                                                    <option value="IL">Израиль</option>
                                                    <option value="IT">Италия</option>
                                                    <option value="CI">Кот-д'Ивуар</option>
                                                    <option value="JM">Ямайка</option>
                                                    <option value="JP">Япония</option>
                                                    <option value="JE">Джерси</option>
                                                    <option value="JO">Иордания</option>
                                                    <option value="KZ">Казахстан</option>
                                                    <option value="KE">Кения</option>
                                                    <option value="KI">Кирибати</option>
                                                    <option value="KW">Кувейт</option>
                                                    <option value="KG">Кыргызстан</option>
                                                    <option value="LA">Лаос</option>
                                                    <option value="LV">Латвия</option>
                                                    <option value="LB">Ливан</option>
                                                    <option value="LS">Лесото</option>
                                                    <option value="LR">Либерия</option>
                                                    <option value="LY">Ливия</option>
                                                    <option value="LI">Лихтенштейн</option>
                                                    <option value="LT">Литва</option>
                                                    <option value="LU">Люксембург</option>
                                                    <option value="MO">САР Макао, Китай</option>
                                                    <option value="MK">Македония</option>
                                                    <option value="MG">Мадагаскар</option>
                                                    <option value="MW">Малави</option>
                                                    <option value="MY">Малайзия</option>
                                                    <option value="MV">Мальдивы</option>
                                                    <option value="ML">Мали</option>
                                                    <option value="MT">Мальта</option>
                                                    <option value="MH">Маршалловы острова</option>
                                                    <option value="MQ">Мартиника</option>
                                                    <option value="MR">Мавритания</option>
                                                    <option value="MU">Маврикий</option>
                                                    <option value="YT">Майотта</option>
                                                    <option value="MX">Мексика</option>
                                                    <option value="FM">Микронезия</option>
                                                    <option value="MD">Молдова</option>
                                                    <option value="MC">Монако</option>
                                                    <option value="MN">Монголия</option>
                                                    <option value="ME">Черногория</option>
                                                    <option value="MS">Монтсеррат</option>
                                                    <option value="MA">Марокко</option>
                                                    <option value="MZ">Мозамбик</option>
                                                    <option value="MM">Мьянма</option>
                                                    <option value="NA">Намибия</option>
                                                    <option value="NR">Науру</option>
                                                    <option value="NP">Непал</option>
                                                    <option value="NL">Нидерланды</option>
                                                    <option value="AN">Нидерландские Антильские острова</option>
                                                    <option value="NC">Новая Каледония</option>
                                                    <option value="NZ">Новая Зеландия</option>
                                                    <option value="NI">Никарагуа</option>
                                                    <option value="NE">Нигер</option>
                                                    <option value="NG">Нигерия</option>
                                                    <option value="NU">Ниуэ</option>
                                                    <option value="NF">Остров Норфолк</option>
                                                    <option value="KP">Северная Корея</option>
                                                    <option value="NO">Норвегия</option>
                                                    <option value="OM">Оман</option>
                                                    <option value="PK">Пакистан</option>
                                                    <option value="PS">Палестинская территория</option>
                                                    <option value="PA">Панама</option>
                                                    <option value="PG">Папуа - Новая Гвинея</option>
                                                    <option value="PY">Парагвай</option>
                                                    <option value="PE">Перу</option>
                                                    <option value="PH">Филиппины</option>
                                                    <option value="PN">Питкэрн</option>
                                                    <option value="PL">Польша</option>
                                                    <option value="PT">Португалия</option>
                                                    <option value="QA">Катар</option>
                                                    <option value="IE">Республика Ирландия</option>
                                                    <option value="RE">Воссоединение</option>
                                                    <option value="RO">Румыния</option>
                                                    <option selected="selected" value="RU">Россия</option>
                                                    <option value="RW">Руанда</option>
                                                    <option value="ST">Сан-Томе и Принсипи</option>
                                                    <option value="BL">Сен-Бартельми</option>
                                                    <option value="SH">Святая Елена</option>
                                                    <option value="KN">Сент-Китс и Невис</option>
                                                    <option value="LC">Санкт-Люсия</option>
                                                    <option value="SX">Сен-Мартен (голландская часть)</option>
                                                    <option value="MF">Сен-Мартен (французская часть)</option>
                                                    <option value="PM">Сен-Пьер и Микелон</option>
                                                    <option value="VC">Святой Винсент и Гренадины</option>
                                                    <option value="SM">Сан-Марино</option>
                                                    <option value="SA">Саудовская Аравия</option>
                                                    <option value="SN">Сенегал</option>
                                                    <option value="RS">Сербия</option>
                                                    <option value="SC">Сейшелы</option>
                                                    <option value="SL">Сьерра-Леоне</option>
                                                    <option value="SG">Сингапур</option>
                                                    <option value="SK">Словакия</option>
                                                    <option value="SI">Словения</option>
                                                    <option value="SB">Соломоновы острова</option>
                                                    <option value="SO">Сомали</option>
                                                    <option value="ZA">Южная Африка</option>
                                                    <option value="GS">Южная Георгия/Сандвичевы острова</option>
                                                    <option value="KR">Южная Корея</option>
                                                    <option value="SS">южный Судан</option>
                                                    <option value="ES">Испания</option>
                                                    <option value="LK">Шри-Ланка</option>
                                                    <option value="SD">Судан</option>
                                                    <option value="SR">Суринам</option>
                                                    <option value="SJ">Шпицберген и Ян-Майен</option>
                                                    <option value="SZ">Свазиленд</option>
                                                    <option value="SE">Швеция</option>
                                                    <option value="CH">Швейцария</option>
                                                    <option value="SY">Сирия</option>
                                                    <option value="TW">Тайвань</option>
                                                    <option value="TJ">Таджикистан</option>
                                                    <option value="TZ">Танзания</option>
                                                    <option value="TH">Таиланд</option>
                                                    <option value="TL">Тимор-Лешти</option>
                                                    <option value="TG">Того</option>
                                                    <option value="TK">Токелау</option>
                                                    <option value="TO">Тонга</option>
                                                    <option value="TT">Тринидад и Тобаго</option>
                                                    <option value="TN">Тунис</option>
                                                    <option value="TR">Турция</option>
                                                    <option value="TM">Туркменистан</option>
                                                    <option value="TC">острова Теркс и Кайкос</option>
                                                    <option value="TV">Тувалу</option>
                                                    <option value="UG">Уганда</option>
                                                    <option value="UA">Украина</option>
                                                    <option value="AE">Объединенные Арабские Эмираты</option>
                                                    <option value="GB">Соединенное Королевство (Великобритания)</option>
                                                    <option value="US">Соединенные Штаты (США)</option>
                                                    <option value="UY">Уругвай</option>
                                                    <option value="UZ">Узбекистан</option>
                                                    <option value="VU">Вануату</option>
                                                    <option value="VA">Ватикан</option>
                                                    <option value="VE">Венесуэла</option>
                                                    <option value="VN">Вьетнам</option>
                                                    <option value="WF">Уоллис и Футуна</option>
                                                    <option value="EH">Западная Сахара</option>
                                                    <option value="WS">Западное Самоа</option>
                                                    <option value="YE">Йемен</option>
                                                    <option value="ZM">Замбия</option>
                                                    <option value="ZW">Зимбабве</option>
                                                </select>
                                            </p>

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Имя <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_first_name" name="billing_first_name" class="input-text ">
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Фамилия <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_last_name" name="billing_last_name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">Название компании</label>
                                                <input type="text" value="" placeholder="" id="billing_company" name="billing_company" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Адрес <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Адрес" id="billing_address_1" name="billing_address_1" class="input-text ">
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Город <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Город" id="billing_city" name="billing_city" class="input-text ">
                                            </p>

                                            <p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
                                                <label class="" for="billing_state">Регион</label>
                                                <input type="text" id="billing_state" name="billing_state" placeholder="Страна" value="" class="input-text ">
                                            </p>
                                            <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                <label class="" for="billing_postcode">Почтовый индекс <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Почтовый индекс" id="billing_postcode" name="billing_postcode" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_email" name="billing_email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Телефон <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_phone" name="billing_phone" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                        </div>
                                    </div>
                                </div>

                                <h3 id="order_review_heading">Ваш заказ</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Товар</th>
                                                <th class="product-total">Стоимость</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $us = $dbh->prepare("SELECT * FROM \"user\" WHERE id=".$_COOKIE['id'] );
                                            $us->execute();
                                            $user_shipp = $us->fetch(PDO::FETCH_ASSOC);
                                            $us = $dbh->prepare("SELECT * FROM composition WHERE \"user\"=".$_COOKIE['id'] );
                                            $us->execute();
                                            $composition = $us->fetchAll(PDO::FETCH_ASSOC);
                                            $table_comp = '<table class="5cecc39b9b313282info-table" cellpadding="0" cellspacing="0" style="border-bottom-color:#222;border-bottom-style:dotted;border-bottom-width:1px;padding:5px 0 5px 0;width:100%"><tbody><tr><td style="padding:5px;text-align:left;vertical-align:top">N</td><td style="padding:5px;text-align:left;vertical-align:top">Наим. пр.</td><td style="padding:5px;text-align:right;vertical-align:top">Цена за ед. пр.</td><td style="padding:5px;text-align:right;vertical-align:top">Колич. пр.</td><td style="padding:5px;text-align:right;vertical-align:top">Стоимость пр.</td></tr>';
                                            for ($i=0; $i < count($composition); $i++) {
                                                $us = $dbh->prepare("SELECT * FROM product WHERE id=".$composition[$i]['product'] );
                                                $us->execute();
                                                $com_prod = $us->fetch(PDO::FETCH_ASSOC);
                                                $composition_n = $composition[$i]['id'];
                                                $table_comp .= '<tr>';
                                             ?>
                                            <tr class="cart_item">
                                                <?php
                                                $table_comp .= '<td style="padding:5px;text-align:left;vertical-align:top">'.strval($i+1).'.</td><td style="padding:5px;text-align:left;vertical-align:top">
                                                    '.$com_prod['name'].'</td><td style="padding:5px;text-align:right;vertical-align:top">'.$com_prod['price'].'</td>
                                                <td style="padding:5px;text-align:right;vertical-align:top">
                                                    '.$composition[$i]['quantity'].'</td><td style="padding:5px;text-align:right;vertical-align:top">'.$composition[$i]['amount'].'</td>';
                                                echo '<td class="product-name">
                                                    '.$com_prod['name'].' <strong class="product-quantity">× '.$composition[$i]['quantity'].'</strong> </td>
                                                <td class="product-total">
                                                    <span class="amount">'.$composition[$i]['amount'].' руб.</span> </td>';
                                                 ?>
                                            </tr>
                                        <?php
                                            $table_comp .= '</tr>';
                                        }

                                        $compsum = 0;
                                        for ($i=0; $i < count($composition); $i++) {
                                            $compsum = $compsum + $composition[$i]['amount'];
                                        }
                                        $table_comp .= '<tr><td style="padding:5px;text-align:left;vertical-align:top">'.strval(count($composition)+1).'.</td><td style="padding:5px;text-align:left;vertical-align:top">Доставка<br><div style="display:inline-block;font-size:0.8em"></div><br><div style="display:inline-block;font-size:0.8em;white-space:nowrap">Признак способа расчета: ПОЛНЫЙ РАСЧЕТ</div></td><td style="padding:5px;text-align:right;vertical-align:top">200</td><td style="padding:5px;text-align:right;vertical-align:top">'.$user_shipp['ship'].'</td><td style="padding:5px;text-align:right;vertical-align:top">'.strval($user_shipp['ship']*200).'</td></tr></tbody></table>';
                                        $table_comp .= '<table class="b8862a3dd1fb10e5totals-table" cellpadding="0" cellspacing="0" style="border-bottom-color:#222;border-bottom-style:dotted;border-bottom-width:1px;padding:5px 0 5px 0;width:100%"><tbody><tr class="289d16d160a45f1dtotals-row" style="font-size:1.2em;font-weight:bold"><td>Итого</td><td style="padding:5px 0 5px 0;text-align:right">'.strval(($user_shipp['ship']*200)+$compsum).'</td></tr><tr><td>БЕЗНАЛИЧНЫМИ</td><td style="padding:5px 0 5px 0;text-align:right">'.strval(($user_shipp['ship']*200)+$compsum).'</td></tr></tbody></table>';
                                        ?>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Промежуточный итог</th>
                                                <?php
                                                echo '<td><span class="amount">'.$compsum.' руб.</span></td>';
                                                 ?>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Доставка и погрузочно-разгрузочные работы</th>
                                                <td>
                                                    <?php echo(strval($user_shipp['ship']*200).' руб.'); ?>
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Итого</th>
                                                <td><strong><span class="amount">
                                                <?php echo(strval(($user_shipp['ship']*200)+$compsum).' руб.'); ?>
                                            </span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_paypal">
                                                <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
                                                <label for="payment_method_paypal">Оплатить картой <img src="img\paysystemlogo_applegoogle.png" width="400px">
                                                </label>
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Разместить заказ" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['woocommerce_checkout_place_order'])) {
                                $table_comp .= '<table class="5cecc39b9b313282info-table" cellpadding="0" cellspacing="0" style="padding:5px 0 5px 0;width:100%"><tbody><tr><td style="padding:5px;width:50%">ЭЛ. АДР. ПОКУПАТЕЛЯ: <br><a href="mailto:'.$_POST['billing_email'].'" target="_blank" rel="noopener noreferrer">'.$_POST['billing_email'].'</a></td><td style="padding:5px">ЭЛ. АДР. ОТПРАВИТЕЛЯ: <br><a href="mailto:orenburg.nit.56@bk.ru" target="_blank" rel="noopener noreferrer">orenburg.nit.56@bk.ru</a></td></tr><tr><td style="padding:5px;width:50%">Сайт ФНС: <a href="https://www.nalog.gov.ru/" data-link-id="1" target="_blank" rel="noopener noreferrer">www.nalog.gov.ru</a></td><td style="padding:5px"></td></tr></tbody></table>';
                                $to = $_POST['billing_email'];
                                $subject = "Оплата прошла №".$composition_n;
                                $headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
                                $message = '<div style="background-color:#fff;font-family:"courier new" , "courier" , "lucida sans typewriter" , "lucida typewriter" , monospace;margin:0"><div class="bc273c589cd66e20container" style="margin:15px auto 0 auto;padding:15px;width:700px">
                                <div class="a02c3ea6ae6091ffirm-name" style="padding:2.5px;text-align:center">ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ "НИТ"</div><div class="fd0c0a5385563155firm-inn" style="padding:2.5px;text-align:center">ИНН: <span class="wmi-callto">7736207543</span></div><div class="46ef6b38ce73b33dlocation-address" style="padding:2.5px;text-align:center">141281, Россия, Оренбургская обл., г. Оренбург, пр. Парковый, д. 13</div><div class="5bef35048cf8a97eheader" style="font-size:1.5em;font-weight:bold;padding:5px;text-align:center">Кассовый чек. Приход</div><table class="5cecc39b9b313282info-table" cellpadding="0" cellspacing="0" style="border-bottom-color:#222;border-bottom-style:dotted;border-bottom-width:1px;padding:5px 0 5px 0;width:100%"><tbody><tr><td style="padding:5px 0 5px 0;width:60%">Смена N 22</td><td style="padding:5px 0 5px 0">'.date("d.m.y H:i").'</td></tr></tbody></table>'.$table_comp.'</div></div>';

                                if (mail($to,$subject,$message,$headers)) {
                                    $dbh->prepare("DELETE FROM composition WHERE \"user\"=?")->execute([$_COOKIE['id']]);
                                    $dbh->prepare("UPDATE \"user\" SET ship=? WHERE id=?")->execute([0, $_COOKIE['id']]);

                                    for ($i=0; $i < count($composition); $i++) {
                                        $us = $dbh->prepare("SELECT * FROM product WHERE id=".$composition[$i]['product'] );
                                        $us->execute();
                                        $product_composition = $us->fetch(PDO::FETCH_ASSOC);
                                        $dbh->prepare("UPDATE product SET sold=? WHERE id=?")->execute([$product_composition['sold']+$composition[$i]['quantity'], $_COOKIE['id']]);
                                    }
                                }
                                else {
                                    echo "ERROR";
                                }
                            }
                             ?>
                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>



    <?php include 'footer.php'; ?>
  </body>
</html>