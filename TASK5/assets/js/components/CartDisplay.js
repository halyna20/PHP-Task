app.component('cart-display', {
    template:
        `<table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>TITLE</td>
                    <td>PRICE</td>
                    <td>COUNT</td>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody v-for="rows in cart">
            <tr v-for="row in rows" >

                <td>{{ row.product.productId }}</td>
                <td>{{ row.product.name }}</td>
                <td>{{ row.product.price }}</td>
                <td>{{ row.countInCart}}</td>
                <td class=" pr-0 pt-3">
                    <button type="button" class="btn" @click="deleteProductCart(row.product.productId)">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>`,
    data() {
        return {
            cart: [],
        }
    },
    methods: {
        updateCart() {
            axios.post('Controllers/CartController.php', {
                action: 'updateCart',
            }).then(response => {

                this.cart.push(response.data);
            });

        },
        deleteProductCart(id) {
            if (confirm("Are you sure you want to remove this product?")) {
                axios.post('Controllers/CartController.php', {
                    action: "deleteProduct",
                    id: id
                }).then(response => {
                    var filterProduct = this.cart[0].filter(item => item.product.productId !== id);
                    this.cart = [filterProduct];
                    localStorage.setItem('cart', response.data.count);
                    alert(response.data.message);
                });
            }
        }
    },
    created: function () {
        this.updateCart();
    }

})