CartClass = function() {
    this.add = function(productId, options = {}) {
        options = JSON.stringify(options)
        axios.get('/basket/add', {
            params: {
                productId: productId,
                options: options
            }
        });
    };
}

$(document).ready(function () {
    document.Cart = new CartClass();
});
