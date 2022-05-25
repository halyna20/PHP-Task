app.component('favorite-products', {
    template:
        `<table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>TITLE</td>
                    <td>PRICE</td>
                    <td>ACTION</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="row in favorites" :key="row.productId">
                    <td>{{ row.productId }}</td>
                    <td>{{ row.name }}</td>
                    <td>{{ row.price }}</td>
                    <td>
                        <button type="button" class="btn" @click="deleteFavoriteProduct(row.productId)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>`,
    data() {
        return {
            favorites: []
        }
    },
    methods: {
        fetchFavoriteProduct() {
            axios.post('Controllers/ProductController.php', {
                action: 'fetchFavoriteProduct'
            }).then(response => this.favorites = response.data);
        },
        deleteFavoriteProduct(id) {
            if (confirm("Are you sure you want to remove this product?")) {
                axios.post('Controllers/ProductController.php', {
                    action: "deleteFavoriteProduct",
                    id: id
                }).then(response => {
                    this.favorites = this.favorites.filter((item) => item.productId !== id);
                    if (response.data.count != undefined) {
                        localStorage.setItem('favorite', response.data.count);
                    }
                    alert(response.data.message);
                });
            }
        }
    },
    created: function () {
        this.fetchFavoriteProduct();
    }
})