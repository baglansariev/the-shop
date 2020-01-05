<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if( isset($title) ) echo $title; ?></title>
        <link rel="stylesheet" href="/app/public/style/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="/app/public/style/bootstrap/bootstrap-grid.css">
        <link  rel="stylesheet" href="/app/public/style/font-awesome/css/all.min.css">

        <!-- Adding style dynamically  -->
        <?php if( isset($stylesheet) ): ?>
        <?php foreach ($stylesheet as $css): ?>
        <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
        <?php endif; ?>

        <link rel="stylesheet" href="/app/public/style/css/main.css">
        <script src="/app/public/style/js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="/app/public/style/js/jquery-3.4.0.min.js"></script>
        <script type="text/javascript" src="/app/public/style/font-awesome/js/all.min.js"></script>
        <!-- Adding scripts into the head dynamically  -->
        <?php if( isset($head_script) ): ?>
        <?php foreach ($head_script as $js): ?>
        <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
        <?php endif; ?>
        <script src="/app/public/style/js/cart/cartRender.js"></script>
        <script src="/app/public/style/js/cart/cart.js"></script>
        <script src="/app/public/style/js/cart/checkout.js"></script>
        <script src="/app/public/style/js/currency.js"></script>
        <script src="/app/public/style/js/main.js"></script>
    </head>
    <body>
        <?php if( isset($content) ) echo $content; ?>

        <!--  Shows alert messages  -->
        <section class="layout-alert">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert-status d-flex flex-column justify-content-center align-items-center">
                            <div class="alert-icon">
                                <i class="fas"></i>
                            </div>
                            <div class="alert-message">
                                <p class="message"></p>
                            </div>
                            <div class="alert-buttons d-flex justify-content-between flex-wrap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="/app/public/style/bootstrap/bootstrap.js"></script>
        <script src="/app/public/style/bootstrap/bootstrap.bundle.min.js"></script>

        <!-- Adding scripts into the body dynamically  -->
        <?php if( isset($body_script) ): ?>
        <?php foreach ($body_script as $js): ?>
        <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
        <?php endif; ?>
    </body>
</html>