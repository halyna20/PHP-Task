app.component("header-display", {
    template:
        `<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="favorites.php">Favorites: <span>{{favoriteCount}}</span></a>
                </li>
            </ul>
            <a href="cart.php" class="btn btn-outline-primary ml-2"><i class="fa-solid fa-cart-shopping"></i><span>{{cartCount}}</span>
            </a>
        </div>
    </nav>`,
    data() {
        return {
            cartCount: 0,
            favoriteCount: 0
        }
    },
    methods: {
        updateData() {
            if (localStorage.getItem('cart') !== null) {
                this.cartCount = localStorage.getItem('cart');
            }
            if (localStorage.getItem('favorite') !== null) {
                this.favoriteCount = localStorage.getItem('favorite');
            }
        }
    },
    created: function () {
        this.updateData();
    }
})