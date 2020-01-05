<?php
    namespace app\controllers\template;

    use app\controllers\cart\Cart;
    use app\controllers\cart\Transport;
    use app\controllers\product\Product;
    use app\controllers\product\Rating;
    use core\main\Controller;
    use core\lib\Session;

    class Page extends Controller
    {
        private $header;

        public function __construct()
        {
            $this->header = new Header;
        }

        // Main page
        public function home()
        {
            $data['title'] = 'Home Page';
            // Adds scripts to the <head>
            $data['head_script'][] = '/app/public/style/js/rating.js';

            $products = (new Product) -> getList();
            $rating = new Rating(5);

            if($products)
            {
                foreach ($products as $key => $product)
                {
                    $data['products'][$key]['id'] = $product['id'];
                    $data['products'][$key]['title'] = $product['title'];
                    $data['products'][$key]['price'] = $product['price'];
                    $data['products'][$key]['image'] = $product['image'];
                    $data['products'][$key]['avg_rating'] = number_format($rating->getRating($product['id'])['average'], 1);
                }
                $data['rating_scale'] = $rating->scale;
            }

            $data['header'] = $this->header->show();

            $this->page('home', $data);
        }

        // Cart page
        public function cart()
        {
            $data['title'] = 'Cart';
            // Adds css file
            $data['stylesheet'][] = '/app/public/style/css/cart.css';

            $cart = new Cart(new Session, new Product);

            $cart_items = $cart->getItems();
            if ($cart_items)
            {
                $data['cart_items'] = [];
                foreach ($cart_items as $key => $item)
                {
                    $data['cart_items'][$key]['id'] = $item['id'];
                    $data['cart_items'][$key]['title'] = $item['title'];
                    $data['cart_items'][$key]['price'] = number_format($item['price'], 2, '.', ' ');
                    $data['cart_items'][$key]['item_total_price'] = number_format($item['item_total_price'], 2, '.', ' ');
                    $data['cart_items'][$key]['image'] = $item['image'];
                    $data['cart_items'][$key]['quantity'] = $item['quantity'];
                }
            }
            $data['items_total_price'] = number_format( $cart->getItemsSum(), 2, '.', ' ' );
            $data['transports'] = ( new Transport ) -> getList();

            $data['header'] = $this->header->show();

            $this->page('cart', $data);
        }
    }