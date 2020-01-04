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
                    page.renderTotal( currency.format(result.total) );
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
                        page.alertReload('Thank you for your purchaces!');
                    }
                    else
                    {
                        page.alertReload('You don\'t have enough money to buy these products!');
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
        else
        {
            alert('Please choose the transport type!');
        }
    }
};