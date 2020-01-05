<?php
    return [
        '/' => [
            'controller' => 'template\Page',
            'action' => 'home',
        ],
        '/cart' => [
            'controller' => 'template\Page',
            'action' => 'cart',
        ],
        '/cart-add' => [
            'controller' => 'cart\AjaxController',
            'action' => 'cartAdd',
        ],
        '/cart-remove' => [
            'controller' => 'cart\AjaxController',
            'action' => 'cartRemove',
        ],
        '/cart-change-quantity' => [
            'controller' => 'cart\AjaxController',
            'action' => 'changeItemQuantity',
        ],
        '/checkout-total' => [
            'controller' => 'cart\AjaxController',
            'action' => 'getTotal',
        ],
        '/checkout-buy' => [
            'controller' => 'cart\AjaxController',
            'action' => 'buy',
        ],
        '/set-rating' => [
            'controller' => 'product\AjaxController',
            'action' => 'rating',
        ],
    ];