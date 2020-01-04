<?php
    namespace app\controllers\template;

    use core\main\Controller;
    use core\lib\Session;
    use app\controllers\wallet\Wallet;
    use app\controllers\cart\Cart;
    use app\controllers\product\Product;

    class Header extends Controller
    {
        public function show()
        {

            $data['money'] = ( new Wallet(new Session) )->getMoney();
            $data['cart_items'] = ( new Cart( new Session, new Product ) )->getItemsCount() ?? '0';

            return $this->view('header', $data);
        }
    }