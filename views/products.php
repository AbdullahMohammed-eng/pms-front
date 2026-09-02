<?php
$products = get_products();
?>

<section class="py-5">
    <div class="container px-4 px-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Product Management</h2>
            <a href="index.php?page=product-create" class="btn btn-primary">+ Add New Product</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No products found. Add a product first.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $index => $p): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td class="fw-bold"><?= htmlspecialchars($p['name']) ?></td>
                                <td><?= htmlspecialchars($p['category'] ?? 'N/A') ?></td>
                                <td>$<?= number_format($p['price'], 2) ?></td>
                                <td><?= $p['stock'] ?? 0 ?></td>
                                <td>
                                    <span class="badge bg-<?= ($p['status'] ?? 'active') === 'active' ? 'success' : 'secondary' ?>">
                                        <?= ucfirst($p['status'] ?? 'active') ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="index.php?page=product-edit&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="actions/delete_product.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>