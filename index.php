<?php
include 'include/header.php';
?>

<?php
?>
<main>
    <div class="container">
        <h3>Products</h3>
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>TITLE</td>
                            <td>PRICE</td>
                            <td class="col-2">ACTION</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in allData" :key="row.productId">
                            <td>{{ row.productId }}</td>
                            <td>{{ row.name }}</td>
                            <td>{{ row.price }}</td>

                            <td class=" pr-0 pt-3">
                                <button type="button" class="btn" @click="addToCart(row.productId, count[row.productId])">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>

                                <button type="button" class="btn" @click="addToFavorite(row.productId)">
                                    <i class="fa-brands fa-gratipay"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include 'include/footer.php'; ?>