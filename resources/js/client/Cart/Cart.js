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

    this.dropdown = function() {
        axios.get('/basket/dropdown')
            .then(function(response) {
                console.log(response)
                $('#basket-dropdown').html(response.data);
            });
    };

    this.removeCartItem = function(rowId) {
        // alert('To delete');
        axios.delete('/basket/cart_item/' + rowId)
            .then(function(response) {
                console.log('Deleted')
            });
    };
};

$(document).ready(function () {
    document.Cart = new CartClass();
});
