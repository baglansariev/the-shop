let main = {
    alert:
    {
        show(message, status, page_reload = false)
        {
            $('.alert-message p').text(message);
            $('.alert-status').addClass(status);

            let layoutAlert =  $('.layout-alert');
            let alertIcon = $('.alert-icon');
            let alertButtonsDiv = $('.alert-buttons');
            var alertButton = '<button type="button" class="btn btn-lg btn-primary" onclick="main.alert.close(\'' + status + '\')">OK</button>';

            if (page_reload)
            {
                alertButton = '<button type="button" class="btn btn-lg btn-primary" onclick="location.reload()">OK</button>';
            }

            switch (status)
            {
                case 'success':
                    alertIcon.html('<i class="fas fa-check-circle"></i>');
                    alertButtonsDiv.html(alertButton);
                    break;

                case 'danger':
                    alertIcon.html('<i class="fas fa-times-circle"></i>');
                    alertButtonsDiv.html(alertButton);
                    break;

                case 'warning':
                    alertIcon.html('<i class="fas fa-exclamation-circle"></i>');
                    alertButtonsDiv.html(alertButton);
                    break;

                case 'cart-success':
                    alertIcon.html('<i class="fas fa-check-circle"></i>');
                    alertButtonsDiv.html(alertButton + '<a href="/cart" class="btn btn-lg btn-success">Visit cart</a>');
                    break;

                default:
                    alert('There is no such status');
                    break;
            }

            layoutAlert.fadeIn();
        },
        close(status)
        {
            $('.layout-alert').fadeOut();
            $('.alert-status').removeClass(status);
        }
    }
};