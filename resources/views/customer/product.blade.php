<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Styles for positioning the link */
        .corner-link {
            position: fixed;
            top: 20px; /* Adjust the top distance as needed */
            right: 20px; /* Adjust the right distance as needed */
            z-index: 999; /* Set z-index to ensure it's above other elements */
            background-color: #ffffff; /* Optional background color */
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 align="center">BOOK MY BOOK</h1><br>
        <a href="#" class="corner-link">My Orders</a>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        <!-- Loop through books -->
        @foreach ($books as $index => $book)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book['name'] }}</h5>
                        <p class="card-text">Price: Rs. {{ $book['price'] }}</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End book cards -->
    </div>
</div>

<!-- Bootstrap JS (Optional for some features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
