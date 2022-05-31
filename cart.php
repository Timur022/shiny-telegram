<?php
    require_once 'config.php';
    $us = $dbh->prepare("SELECT * FROM product");
    $us->execute();
    $product = $us->fetchAll(PDO::FETCH_ASSOC);
 ?>

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
    $active4 = ' class="active">';
    $active5 = '>';
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
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Товары</h2>
                        <?php
                        for ($i=0; $i < 4; $i++) {
                        ?>
                        <div class="thubmnail-recent">
                            <?php echo '<img src="img/' . $product[$i]['foto'] . '1.png" class="recent-thumb" alt="">'; ?>
                            <?php echo '<h2><a href="single-product.php?product=' . $product[$i]['name'] . '&foto=1">' . $product[$i]['name'] . '</a></h2>';?>
                            <div class="product-sidebar-price">
                                <?php echo '<ins>' . $product[$i]['price'] . ' руб.</ins>'; ?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="checkout.php">
                                <?php
                                echo '<input type="hidden" value="'.$_POST['calc_shipping_country'].'" name="calc_shipping_country">';
                                echo '<input type="hidden" value="'.$_POST['calc_shipping_state'].'" name="calc_shipping_state">';
                                ?>
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Товар</th>
                                            <th class="product-price">Цена</th>
                                            <th class="product-quantity">Количество</th>
                                            <th class="product-subtotal">Итого</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $us = $dbh->prepare("SELECT * FROM composition WHERE user=".$_COOKIE['id'] );
                                        $us->execute();
                                        $composition = $us->fetchAll(PDO::FETCH_ASSOC);
                                        for ($i=0; $i < count($composition); $i++) {
                                            $us = $dbh->prepare("SELECT * FROM product WHERE id=".$composition[$i]['product'] );
                                            $us->execute();
                                            $com_prod = $us->fetch(PDO::FETCH_ASSOC);
                                         ?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <?php echo '<a title="Remove this item" class="remove" href="del_el_cart.php?id='.strval($composition[$i]['id']).'">×</a>';?>
                                            </td>

                                            <td class="product-thumbnail">
                                                <?php echo '<a href="single-product.php?product='.$com_prod['name'].'&foto=1"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/'.$com_prod['foto'].'1.png"></a>'; ?>
                                            </td>

                                            <td class="product-name">
                                                <?php echo '<a href="single-product.php?product='.$com_prod['name'].'&foto=1">'.$com_prod['name'].'</a>'; ?>
                                            </td>

                                            <td class="product-price">
                                                <?php echo '<span class="amount">'.$com_prod['price'].' руб.</span>'; ?>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <?php echo $composition[$i]['quantity']; ?>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <?php echo '<span class="amount">'.$composition[$i]['amount'].' руб.</span>'; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <button class="add_to_cart_button" type="submit">Оформить заказ</button>
                            </form>

                            <div class="cart-collaterals">

                            <div class="cart_totals ">
                                <h2>Итого</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Промежуточный итог</th>
                                            <?php
                                            $compsum = 0;
                                            for ($i=0; $i < count($composition); $i++) {
                                                $compsum = $compsum + $composition[$i]['amount'];
                                            }
                                            echo '<td><span class="amount">'.$compsum.' руб.</span></td>';
                                            ?>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Доставка и погрузочно-разгрузочные работы</th>
                                            <?php
                                            $us = $dbh->prepare("SELECT * FROM user WHERE id=".$_COOKIE['id'] );
                                            $us->execute();
                                            $user_shipp = $us->fetch(PDO::FETCH_ASSOC);
                                            $calc_shipping = 0;
                                            if (isset($_POST['calc_shipping'])) {
                                                $calc_shipping = 200;
                                                $dbh->prepare("UPDATE user SET ship=? WHERE id=?")->execute([1, $_COOKIE['id']]);
                                            }
                                            if ($user_shipp['ship']==1){
                                                echo '<td>200 руб.</td>';
                                            }
                                            else{
                                                echo '<td>'.$calc_shipping.' руб.</td>';
                                            } ?>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Итог</th>
                                            <?php

                                            if ($user_shipp['ship']==1){
                                            echo '<td><strong><span class="amount">'.strval(200+$compsum).' руб.</span></strong> </td>';
                                            }
                                            else{
                                            echo '<td><strong><span class="amount">'.strval($calc_shipping+$compsum).' руб.</span></strong> </td>';
                                            }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <form method="post" action="" class="shipping_calculator">
                                <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Рассчитать доставку</a></h2>

                                <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

                                <p class="form-row form-row-wide">
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
                                <?php
                                echo '<input type="hidden" value="200" name="price_sh">';
                                 ?>
                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_state" name="calc_shipping_state" placeholder="Город" value="" class="input-text"> </p>

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Почтовый индекс" value="" class="input-text"></p>


                                <p><button class="button" value="1" name="calc_shipping" type="submit">Обновить</button></p>

                                </section>
                            </form>


                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
  </body>
</html>
