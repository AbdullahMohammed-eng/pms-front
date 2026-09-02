<?php
$is_edit = false;
$product = ['id' => '', 'name' => '', 'category' => '', 'price' => '', 'stock' => 1, 'image' => '', 'description' => '', 'status' => 'active'];

if (isset($_GET['id'])) {
    $found = get_product_by_id($_GET['id']);
    if ($found) {
        $product = $found;
        $is_edit = true;
    }
}
?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h2 class="mb-4 text-center"><?= $is_edit ? 'Edit Product' : 'Create Product' ?></h2>
            <form action="actions/<?= $is_edit ? 'edit_product.php' : 'add_product.php' ?>" method="post" class="border rounded p-4 shadow-sm bg-white">
                <?php if ($is_edit): ?>
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label for="product_name" class="form-label fw-bold">Product Name</label>
                    <input type="text" id="product_name" name="product_name" class="form-control border border-success" value="<?= htmlspecialchars($product['name']) ?>" placeholder="Enter product name" required>
                </div>

                <div class="mb-3">
                    <label for="product_category" class="form-label fw-bold">Category</label>
                    <select id="product_category" name="category_id" class="form-select border border-success" required>
                        <option value="">Select category</option>
                        <option value="Sports Cars" <?= $product['category'] === 'Sports Cars' ? 'selected' : '' ?>>Sports Cars</option>
                        <option value="SUVs" <?= $product['category'] === 'SUVs' ? 'selected' : '' ?>>SUVs</option>
                        <option value="Sedans" <?= $product['category'] === 'Sedans' ? 'selected' : '' ?>>Sedans</option>
                        <option value="Electric Cars" <?= $product['category'] === 'Electric Cars' ? 'selected' : '' ?>>Electric Cars</option>
                        <option value="Luxury Cars" <?= $product['category'] === 'Luxury Cars' ? 'selected' : '' ?>>Luxury Cars</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label fw-bold">Price</label>
                        <input type="number" id="price" name="price" class="form-control border border-success" step="0.01" min="0" value="<?= $product['price'] ?>" placeholder="0.00" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="stock" class="form-label fw-bold">Stock Quantity</label>
                        <input type="number" id="stock" name="stock_quantity" class="form-control border border-success" min="0" value="<?= $product['stock'] ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image_url" class="form-label fw-bold">Image URL</label>
                    <input type="url" id="image_url" name="image_url" class="form-control border border-success" value="<?= htmlspecialchars($product['image']) ?>" placeholder="https://example.com/product.jpg">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea id="description" name="description" rows="5" class="form-control border border-success" placeholder="Write a short product description..." required><?= htmlspecialchars($product['description']) ?></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold d-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="active" value="active" <?= $product['status'] === 'active' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive" <?= $product['status'] === 'inactive' ? 'checked' : '' ?>>
                        <label class="form-check-label" for="inactive">Inactive</label>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <input type="submit" value="<?= $is_edit ? 'Update Product' : 'Add Product' ?>" class="btn btn-primary px-4">
                    <a href="index.php?page=products" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>