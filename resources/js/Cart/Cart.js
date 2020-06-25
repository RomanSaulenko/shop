CartClass = function() {
    this.add = function(productId, options = {}) {
        axios.post('/cart/add', {
            productId: productId
        });
    };
}

$(document).ready(function () {
    document.Cart = new CartClass();
});
