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
            'controller' => 'AjaxController',
            'action' => 'cartAdd',
        ],
        '/cart-remove' => [
            'controller' => 'AjaxController',
            'action' => 'cartRemove',
        ],
        '/checkout-total' => [
            'controller' => 'AjaxController',
            'action' => 'getTotal',
        ],
        '/checkout-buy' => [
            'controller' => 'AjaxController',
            'action' => 'buy',
        ],
        '/set-rating' => [
            'controller' => 'AjaxController',
            'action' => 'rating',
        ],
    ];