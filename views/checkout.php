<?php
$cart = $_SESSION['cart'] ?? [];
$total_price = 0;

if (empty($cart)) {
    header('Location: index.php?page=cart');
    exit;
}
?>

<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-5">
            <div class="col-md-5 mb-4">
                <div class="border p-4 bg-light rounded">
                    <h4 class="mb-3">Order Summary</h4>
                    <ul class="list-group mb-3">
                        <?php foreach ($cart as $id => $qty):
                            $p = get_product_by_id($id);
                            if (!$p) continue;
                            $subtotal = $p['price'] * $qty;
                            $total_price += $subtotal;
                        ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?= htmlspecialchars($p['name']) ?></h6>
                                    <small class="text-muted">Qty: <?= $qty ?></small>
                                </div>
                                <span class="text-muted">$<?= number_format($subtotal, 2) ?></span>
                            </li>
                        <?php endforeach; ?>
                        <li class="list-group-item d-flex justify-content-between bg-white fw-bold fs-5">
                            <span>Total (USD)</span>
                            <span class="text-success">$<?= number_format($total_price, 2) ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-7">
                <h4 class="mb-3">Customer Information</h4>
                <form action="actions/checkout.php" method="POST" class="border p-4 rounded bg-white">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Phone Number</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label fw-bold">Order Notes (Optional)</label>
                        <textarea id="notes" name="notes" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 btn-lg mt-3">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</section>