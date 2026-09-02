<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - EraaSoft PMS Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">EraaSoft PMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="product.php">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="product-create.php">Create Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                </ul>
                <form class="d-flex" action="cart.php">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Create Product</h1>
                <p class="lead fw-normal text-white-50 mb-0">Add a new product to your store</p>
            </div>
        </div>
    </header>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form action="./index.php?page=create_product" method="post" class="border rounded p-4 shadow-sm bg-white">
                    <div class="mb-3">
                        <label for="product_name" class="form-label fw-bold">Product Name</label>
                        <input type="text" id="product_name" name="product_name" class="form-control border border-success" placeholder="Enter product name" required>
                    </div>

                    <div class="mb-3">
                        <label for="product_category" class="form-label fw-bold">Category</label>
                        <select id="product_category" name="category_id" class="form-select border border-success" required>
                            <option value="">Select category</option>
                            <option value="1">Sports Cars</option>
                            <option value="2">SUVs</option>
                            <option value="3">Sedans</option>
                            <option value="4">Electric Cars</option>
                            <option value="5">Luxury Cars</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label fw-bold">Price</label>
                            <input type="number" id="price" name="price" class="form-control border border-success" step="0.01" min="0" placeholder="0.00" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label fw-bold">Stock Quantity</label>
                            <input type="number" id="stock" name="stock_quantity" class="form-control border border-success" min="0" value="1" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label fw-bold">Image URL</label>
                        <input type="url" id="image_url" name="image_url" class="form-control border border-success" placeholder="https://example.com/product.jpg">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea id="description" name="description" rows="5" class="form-control border border-success" placeholder="Write a short product description..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold d-block">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="active" value="active" checked>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inactive" value="inactive">
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <input type="submit" value="Add Product" class="btn btn-primary px-4">
                        <a href="product.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>