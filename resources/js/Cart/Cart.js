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

    this.dropdown = function(parentNode) {
        axios.get('/basket/dropdown')
            .then(function(response) {
                console.log(response)
                $('#basket-dropdown').html(response.data);
            });
    }
};

$(document).ready(function () {
    document.Cart = new CartClass();
});
