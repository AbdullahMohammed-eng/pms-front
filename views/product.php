<?php
$id = $_GET['id'] ?? null;
$product = $id ? get_product_by_id($id) : null;

if (!$product):
?>
<div class="container py-5 text-center">
    <h2>Product Not Found!</h2>
    <a href="index.php?page=home" class="btn btn-primary mt-3">Back to Home</a>
</div>
<?php else: ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <?php $img = !empty($product['image']) ? $product['image'] : 'https://dummyimage.com/600x700/dee2e6/6c757d.jpg'; ?>
                <img class="card-img-top mb-5 mb-md-0 rounded shadow-sm" src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="max-height: 500px; object-fit: cover;" />
            </div>
            <div class="col-md-6">
                <div class="small mb-1 text-uppercase text-muted">ID: <?= $product['id'] ?> | Category: <?= htmlspecialchars($product['category'] ?? 'General') ?></div>
                <h1 class="display-5 fw-bolder"><?= htmlspecialchars($product['name']) ?></h1>
                <div class="fs-5 mb-4">
                    <span class="fw-bold text-success fs-3">$<?= number_format($product['price'], 2) ?></span>
                </div>
                <p class="lead"><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                <div class="d-flex align-items-center gap-3 mt-4">
                    <a class="btn btn-outline-dark flex-shrink-0 px-4 py-2" href="actions/add_to_cart.php?id=<?= $product['id'] ?>">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </a>
                    <a href="index.php?page=home" class="btn btn-secondary px-4 py-2">Back to Shop</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>