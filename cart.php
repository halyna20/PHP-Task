<?php include 'include/header.php' ?>
<main>
    <div class="container">
        <h3>Cart</h3>
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <cart-display v-model="cart"></cart-display>
            </div>
        </div>
    </div>
</main>
<?php include 'include/footer.php'; ?>