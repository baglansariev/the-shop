$(function ()
{
    // Adds class "active" to the rating stars
    $('.card-rating').on('mouseover', function ()
    {
        let ratingItem = $(this).children('.rating-item');

        ratingItem.on('mouseover', function ()
        {
            addratingClass($(this), ratingItem, 'active');
        })
        .on('mouseleave', function ()
        {
            ratingItem.removeClass('active');
        });
    });

    // Saves raiting to the database
    let ratingItem = $('.rating-item');

    ratingItem.on('click', function () {

        $.ajax({
            url: '/set-rating',
            data: 'product_id=' + $(this).data('id') + '&rating=' + $(this).data('val'),
            type: 'POST',
            dataType: 'json',
            success: function (result)
            {
                if (result.status === true)
                {
                    page.alertReload('Thanks! Your rating has been saved!');
                }
                else
                {
                    page.alertReload('Sorry! You have already rated this product!');
                }
            },
            error: function (e)
            {
                console.log(e);
            }
        })
    });

    function addratingClass(parent, child_list, class_name)
    {
        let count = child_list.length;
        for (let i = 0; i < count; i++)
        {
            if (parent[0] === child_list[i])
            {
                for (let j = i; j >= 0; j--)
                {
                    $(child_list[j]).addClass(class_name);
                }
            }
        }
    }
});