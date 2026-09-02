<?php $products = get_products(); ?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <?php if (isset($_GET['success']) && $_GET['success'] === 'order_created'): ?>
            <div class="alert alert-success text-center mb-4">
                Your order has been placed successfully and saved to orders file!
            </div>
        <?php endif; ?>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php if (empty($products)): ?>
                <div class="col-12 text-center py-5">
                    <h4>No products available at the moment.</h4>
                    <p class="text-muted">Please add products from Create Product page to display here.</p>
                    <a href="index.php?page=product-create" class="btn btn-primary mt-2">Add New Product</a>
                </div>
            <?php else: ?>
                <?php foreach ($products as $p): ?>
                    <div class="col mb-5">
                        <div class="card h-100 shadow-sm">
                            <?php $img = !empty($p['image']) ? $p['image'] : 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg'; ?>
                            <img class="card-img-top" src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($p['name']) ?>" style="height: 200px; object-fit: cover;" />
                            
                            <div class="card-body p-4 text-center">
                                <h5 class="fw-bolder"><?= htmlspecialchars($p['name']) ?></h5>
                                <div class="text-muted small mb-2"><?= htmlspecialchars($p['category'] ?? '') ?></div>
                                <span class="fw-bold text-success fs-5">$<?= number_format($p['price'], 2) ?></span>
                            </div>
                            
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent text-center">
                                <a class="btn btn-outline-dark mt-auto w-100 mb-2" href="actions/add_to_cart.php?id=<?= $p['id'] ?>">Add to cart</a>
                                <a class="btn btn-sm btn-link text-decoration-none text-muted" href="index.php?page=product-details&id=<?= $p['id'] ?>">View details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>