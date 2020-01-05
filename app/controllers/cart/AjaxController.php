<?php
    namespace app\controllers\cart;

    use app\controllers\product\Product;
    use app\controllers\wallet\Wallet;
    use core\lib\Request;
    use core\lib\Response;
    use core\lib\Session;

    // Receives all AJAX queries from JS files
    class AjaxController
    {
        private $request;
        private $response;
        private $cart;
        private $checkout;

        public function __construct()
        {
            $this->request = new Request;
            $this->response = new Response;
            $this->checkout = new Checkout;
            $this->cart = new Cart( new Session, new Product );
        }

        public function cartAdd()
        {
            if ( $this->request->has('product_id') && $this->request->has('quantity') )
            {
                $this->cart->addItem( (int)$this->request->post('product_id'), (int)$this->request->post('quantity') );
                $this->response->outputJson( ['status' => true, 'cart_items' => $this->cart->getItemsCount() ?? '0'] );
                exit;
            }
        }

        public function cartRemove()
        {
            if ( $this->request->has('product_id') )
            {
                $this->cart->remove( (int)$this->request->post('product_id') );
                $json = [
                    'status' => true,
                    'cart_items' => $this->cart->getItems(),
                    'cart_items_count' => $this->cart->getItemsCount() ?? '0',
                    'sum' => $this->cart->getItemsSum() ?? '0'
                ];
                $this->response->outputJson($json);
                exit;
            }
        }

        public function changeItemQuantity()
        {
            if ( $this->request->has('product_id') && $this->request->has('quantity') )
            {
                $this->cart->changeItemsQuantity( (int)$this->request->post('product_id'), (int)$this->request->post('quantity') );
                $json = [
                    'status' => true,
                    'cart_items' => $this->cart->getItems(),
                    'cart_items_count' => $this->cart->getItemsCount() ?? '0',
                    'sum' => $this->cart->getItemsSum() ?? '0'
                ];
                $this->response->outputJson($json);
                exit;
            }
        }

        public function getTotal()
        {
            if ( $this->request->has('transport_price') || $this->request->post('transport_price') == 0 )
            {
                $json = [
                    'status' => true,
                    'total' => $this->checkout->getTotal( (int)$this->request->post('transport_price'), $this->cart->getItemsSum() ),
                ];
                $this->response->outputJson($json);
                exit;
            }
        }

        public function buy()
        {
            if ( $this->request->has('transport_price') || $this->request->post('transport_price') == 0 )
            {
                $total = $this->checkout->getTotal( (int)$this->request->post('transport_price'), $this->cart->getItemsSum() );

                if ($this->checkout->buy($this->cart, new Wallet(new Session), $total))
                {
                    $json['status'] = true;
                }
                else
                {
                    $json['status'] = false;
                }

                $this->response->outputJson($json);
                exit;
            }
        }
    }