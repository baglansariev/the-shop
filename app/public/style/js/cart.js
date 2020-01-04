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
                    page.renderCartItemsCount(result.cart_items);
                    alert('Product has been added to the cart');
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
                    page.renderCartItems(result.cart_items);
                    // Changes quantity of the cart items in the header
                    page.renderCartItemsCount(result.cart_items_count);
                    // Changes SUM in the checkout block
                    page.renderSum(result.sum);
                    // Changes TOTAL in the checkout block
                    page.renderTotal(checkout.getTotal($('[name=transport]').val()));
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    },
};