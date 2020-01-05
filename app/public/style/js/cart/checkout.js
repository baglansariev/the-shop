let checkout = {
    // Counts Total Sum with Transport price
    getTotal(transport_price)
    {
        $.ajax({
            url: '/checkout-total',
            type: 'POST',
            data: 'transport_price=' + transport_price,
            dataType: 'json',
            success: function (result) {
                if (result.status === true)
                {
                    // Changes TOTAL in the checkout block on the cart page
                    cartRender.renderTotal( currency.format(result.total) );
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    },
    buy(checkout_form)
    {
        let transport_price = $(checkout_form).find('[name=transport]').val();
        if (transport_price !== null)
        {
            $.ajax({
                url: '/checkout-buy',
                type: 'POST',
                data: 'transport_price=' + transport_price,
                dataType: 'json',
                success: function (result) {
                    if (result.status === true)
                    {
                       main.alert.show('Thank you for your purchaces!', 'success', true);
                    }
                    else
                    {
                        main.alert.show('You don\'t have enough money to buy these products!', 'danger');
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
        else
        {
            main.alert.show('Please choose the transport type!', 'warning');
        }
    }
};