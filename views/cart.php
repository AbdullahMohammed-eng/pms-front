<?php
$cart = $_SESSION['cart'] ?? [];
$total_price = 0;
$total_items = 0;
?>

<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <div class="card-header bg-dark text-white p-3 text-center">
                        <h4 class="m-0"><i class="bi-calculator me-2"></i>Account & Cart Summary</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php if (empty($cart)): ?>
                            <div class="text-center py-4">
                                <i class="bi-cart-x text-muted display-1"></i>
                                <h5 class="mt-3 text-muted">Your cart is currently empty!</h5>
                                <a href="index.php?page=home" class="btn btn-primary mt-3">Browse Products</a>
                            </div>
                        <?php else: ?>
                            <ul class="list-group list-group-flush mb-3">
                                <?php foreach ($cart as $id => $qty):
                                    $p = get_product_by_id($id);
                                    if (!$p) continue;
                                    $subtotal = $p['price'] * $qty;
                                    $total_price += $subtotal;
                                    $total_items += $qty;
                                ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                        <div>
                                            <h6 class="my-0 fw-bold"><?= htmlspecialchars($p['name']) ?></h6>
                                            <small class="text-muted">Quantity: <?= $qty ?> &times; $<?= number_format($p['price'], 2) ?></small>
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="fw-bold">$<?= number_format($subtotal, 2) ?></span>
                                            <a href="actions/delete_from_cart.php?id=<?= $p['id'] ?>" class="text-danger"><i class="bi-trash-fill"></i></a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="alert alert-info d-flex justify-content-between align-items-center p-3 mb-4 rounded-3">
                                <span class="fs-5 fw-bold">Total Account Due (<?= $total_items ?> items):</span>
                                <span class="fs-3 fw-bolder text-success">$<?= number_format($total_price, 2) ?></span>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="index.php?page=checkout" class="btn btn-success btn-lg fw-bold">Proceed to Checkout ($<?= number_format($total_price, 2) ?>)</a>
                                <a href="index.php?page=home" class="btn btn-outline-secondary">Continue Shopping</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>