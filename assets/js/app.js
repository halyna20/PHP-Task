const app = Vue.createApp({
    el: '#app',
    data() {
        return {
            allData: [],
            count: 0,
            cart: []
        }

    },
    methods: {
        fetchAllData() {
            axios.post('Controllers/ProductController.php', {
                action: 'fetchall'
            }).then(response => this.allData = response.data);

        },
        addToCart(id) {
            axios.post('Controllers/CartController.php', {
                action: 'addCart',
                id: id
            }).then(response => {

                if (response.data.count != undefined) {
                    localStorage.setItem('cart', response.data.count);
                }
                alert(response.data.message);
            }
            );
        },
        addToFavorite(id) {
            axios.post('Controllers/ProductController.php', {
                action: 'addFavorite',
                id: id
            }).then(response => {
                if (response.data.count != undefined) {
                    localStorage.setItem('favorite', response.data.count);
                }
                alert(response.data.message)
            });
        }
    },
    created: function () {
        this.fetchAllData();
    }
});
