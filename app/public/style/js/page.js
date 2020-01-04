let page = {
    // Rewrites cart items after deleting one of them
    renderCartItems(cart_items)
    {
        if (cart_items !== false)
        {
            let tableBody = $('.cart-products tbody');

            tableBody.html('');

            for (let item in cart_items)
            {
                let html = '<tr>';
                html += '<td><div class="cart-product"><div class="image"><img src="' + cart_items[item]['image'] + '" alt="" class="img-fluid"></div><h4 class="title">' + cart_items[item]['title'] + '</h4></div>';
                html += '<td>' + currency.format(cart_items[item]['price']) + '</td>';
                html += '<td>' + cart_items[item]['quantity'] + '</td>';
                html += '<td>' + currency.format(cart_items[item]['item_total_price']) + '</td>';
                html += '<td><button type="button" class="btn btn-sm btn-danger" onclick="cart.remove( ' + cart_items[item]['id'] + ' )"><i class="fas fa-times"></i></button></td>';
                html += '</tr>';

                tableBody.append(html);
            }
        }
        else
        {
            $('.cart-section .row').html('<div class="col-lg-12"><p>You don\'t have any items yet. Let\'s go for some <a href="/" class="empty-cart">purchaces</a></p></div>');
        }
    },
    // Rewrites Quantity of the items in the cart for header
    renderCartItemsCount(items_count)
    {
        $('.header-cart span').text(items_count + ' Items');
    },
    // Changes SUM in the checkout block on the cart page
    renderSum(sum)
    {
        $('#sum').text( currency.format(sum) );
    },
    // Changes TOTAL in the checkout block on the cart page
    renderTotal(sum)
    {
        $('#total').text(sum);
    },
    // Reloads page after reading the message
    alertReload(message)
    {
        if ( !alert(message) )
        {
            location.reload();
        }
    }
};