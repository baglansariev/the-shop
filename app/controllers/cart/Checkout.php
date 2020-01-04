<?php
    namespace app\controllers\cart;

    use app\controllers\wallet\Wallet;

    class Checkout
    {
        public function getTotal($transport_price, $product_sum)
        {
            return $transport_price + $product_sum;
        }

        public function buy(Cart $cart, Wallet $wallet, $total)
        {
            if ($wallet->pay($total))
            {
                $cart->clearCart();
                return true;
            }
            return false;
        }
    }