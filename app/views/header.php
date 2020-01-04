<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-contacts d-flex justify-content-lg-start justify-content-md-center">
                        <a href="tel:+77024441143">
                            <i class="fas fa-phone-alt"></i>
                            <span>+7 702 444 11 43</span>
                        </a>
                        <a href="mailto:baglansariev@mail.ru">
                            <i class="fas fa-envelope"></i>
                            <span>baglansariev@mail.ru</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-lg-end justify-content-md-center">
                    <div class="header-user-menu">
                        <a href="#">
                            <i class="fas fa-wallet"></i>
                            <span>$<?php if ( isset($money) ) echo $money; ?></span>
                        </a>
                        <a href="/cart" class="header-cart">
                            <i class="fas fa-shopping-cart"></i>
                            <span ><?php if ( isset($cart_items) ) echo $cart_items; ?> Items</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <a href="/" class="logo">
                        The SHOP
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>