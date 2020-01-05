let cart = {
    // Adds item to the cart
    add(product_id, quantity = 1)
    {
        $.ajax({
            url: '/cart-add',
            type: 'POST',
            data: 'product_id=' + product_id + '&quantity=' + quantity,
            dataType: 'json',
            success: function (result) {
                if (result.status === true)
                {
                    // Changes quantity of the cart items in the header
                    cartRender.renderCartItemsCount(result.cart_items);
                    main.alert.show('Product has been added to the cart! You can change the quantity of this product there.', 'cart-success');
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    },
    // Removes item from the cart
    remove(product_id)
    {
        $.ajax({
            url: '/cart-remove',
            type: 'POST',
            data: 'product_id=' + product_id,
            dataType: 'json',
            success: function (result) {
                if (result.status === true)
                {
                    // Rewrites cart items
                    cartRender.renderCartItems(result.cart_items);
                    // Changes quantity of the cart items in the header
                    cartRender.renderCartItemsCount(result.cart_items_count);
                    // Changes SUM in the checkout block
                    cartRender.renderSum(result.sum);
                    // Changes TOTAL in the checkout block
                    cartRender.renderTotal(checkout.getTotal($('[name=transport]').val()));
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    },
    changeQuantity(product_id, input)
    {
        let quantity = parseInt($(input).val());
        product_id = parseInt(product_id);

        if (quantity > 0)
        {
            $.ajax({
                url: '/cart-change-quantity',
                type: 'POST',
                data: 'product_id=' + product_id + '&quantity=' + quantity,
                dataType: 'json',
                success: function (result) {
                    if (result.status === true)
                    {
                        // Rewrites cart items
                        cartRender.renderCartItems(result.cart_items);
                        // Changes quantity of the cart items in the header
                        cartRender.renderCartItemsCount(result.cart_items_count);
                        // Changes SUM in the checkout block
                        cartRender.renderSum(result.sum);
                        // Changes TOTAL in the checkout block
                        cartRender.renderTotal(checkout.getTotal($('[name=transport]').val()));
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
        else
        {
            main.alert.show('Please insert the right quantity or delete this product from the cart!', 'danger');
        }

    }
};