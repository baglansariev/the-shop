<?php
    namespace app\controllers\cart;

    use app\controllers\product\Product;
    use core\lib\Session;

    class Cart
    {
        private $session;
        private $products;

        public function __construct(Session $session, Product $product)
        {
            $this->session = $session;
            $this->products = $product;
        }

        public function getItems()
        {
            if ( $this->session->has('cart_items') )
            {
                $data['cart_items'] = [];
                
                foreach ($this->session->get('cart_items') as $key => $cart_item)
                {
                    foreach ($this->products->getItem($cart_item['id']) as $product)
                    {
                        $data['cart_items'][$key]['id'] = $product['id'];
                        $data['cart_items'][$key]['title'] = $product['title'];
                        $data['cart_items'][$key]['price'] = $product['price'];
                        $data['cart_items'][$key]['item_total_price'] = $product['price'] * $cart_item['quantity'];
                        $data['cart_items'][$key]['image'] = $product['image'];
                        $data['cart_items'][$key]['quantity'] = $cart_item['quantity'];
                    }
                }
                return $data['cart_items'];
            }
            return false;
        }

        public function getItemsCount()
        {
            if ( $this->session->has('cart_items_quantity') )
            {
                return $this->session->get('cart_items_quantity');
            }
            return null;
        }

        public function getItemsSum()
        {
            $sum = 0;
            if ( $this->session->has('cart_items') )
            {
                foreach ($this->session->get('cart_items') as $key => $cart_item)
                {
                    foreach ($this->products->getItem($cart_item['id']) as $product)
                    {
                        if ($cart_item['id'] == $product['id'])
                        {
                            $sum = $sum + $cart_item['quantity'] * $product['price'];
                        }
                    }
                }
            }
            return $sum;
        }

        public function addItem($product_id, $quantity)
        {
            $items_quantity = 0;
            // Checks, if there are any products in the session.
            if ( $this->session->has('cart_items') )
            {
                $added = false;
                $items_list = [];

                // If products were previously added, it looks for products with the same ID and just changes the quantity
                foreach ($this->session->get('cart_items') as $key => $item)
                {
                    $items_list[$key]['id'] = $item['id'];
                    $items_list[$key]['quantity'] = $item['quantity'];
                    if ($product_id == $item['id'])
                    {
                        $items_list[$key]['quantity'] = $item['quantity'] + (int)$quantity;
                        $added = true;
                    }
                    // Counting products quantity in the cart
                    $items_quantity = $items_quantity + $items_list[$key]['quantity'];
                }
                // Rewrites product data in the session
                $this->session->set('cart_items', $items_list);

                // If products were previously added, but there is no product with this ID, it adds the product data to the end of session array
                if (!$added)
                {
                    $this->session->push('cart_items', ['id' => (int)$product_id, 'quantity' => (int)$quantity]);
                    $items_quantity = $items_quantity + 1;
                }
            }
            else
            {
                // If there is no any products in the session, it sets new data
                $this->session->set('cart_items', [0 => ['id' => (int)$product_id, 'quantity' => (int)$quantity]]);
                $items_quantity = 1;
            }

            $this->session->set('cart_items_quantity', $items_quantity);
        }

        // Remove cart item
        public function remove($product_id)
        {
            if ( $this->session->has('cart_items') )
            {
                $items_list = [];
                foreach ($this->session->get('cart_items') as $key => $item)
                {
                    if ($item['id'] !== $product_id)
                    {
                        $items_list[$key]['id'] = $item['id'];
                        $items_list[$key]['quantity'] = $item['quantity'];
                    }
                    else
                    {
                        $this->session->set('cart_items_quantity', $this->getItemsCount() - $item['quantity']);
                    }
                }
                $this->session->set('cart_items', $items_list);
            }
        }

        public function changeItemsQuantity($product_id, $quantity)
        {
            if ( $this->session->has('cart_items') )
            {
                $items_list = [];
                $items_count = 0;
                foreach ($this->session->get('cart_items') as $key => $item)
                {
                    $items_list[$key]['id'] = $item['id'];
                    $items_list[$key]['quantity'] = $item['quantity'];
                    if ($item['id'] == $product_id)
                    {
                        $items_list[$key]['quantity'] = $quantity;
                    }
                    $items_count = $items_count + $items_list[$key]['quantity'];
                }
                // Changes cart items in session
                $this->session->set('cart_items', $items_list);
                $this->session->set('cart_items_quantity', $items_count);
            }
        }

        public function clearCart()
        {
            $this->session->del('cart_items');
            $this->session->del('cart_items_quantity');
        }
    }