let currency = {
    format(int)
    {
        let number = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        });
        return number.format(int);
    }
};