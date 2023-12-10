<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BOOK MY BOOK</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Styles for positioning the link */
        .corner-link {
            position: fixed;
            top: 20px;
            /* Adjust the top distance as needed */
            right: 20px;
            /* Adjust the right distance as needed */
            z-index: 999;
            /* Set z-index to ensure it's above other elements */
            background-color: #ffffff;
            /* Optional background color */
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    {{-- @if (Auth::check()) --}}
        <div class="container mt-5">
            <h1 align="center">BOOK MY BOOK</h1><br>
            @if (Auth::check())
             <p>Welcome, {{ Auth::user()->name }}</p>
             @endif
            <a href="{{ route('checkout') }}" class="corner-link" target="_blank">Checkout</a>

            <div class="row row-cols-1 row-cols-md-3 g-4">

                <!-- Loop through books -->
                @foreach ($books as $index => $book)
                <form action="{{ route('addToCart', ['bookId' => $book['id']]) }}" method="POST">
                    @csrf
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book['name'] }}</h5>
                                <p class="card-text">Price: Rs. {{ $book['price'] }}</p>
                                <input type="number" name="quantity" min="1" max="4" value="1"><br><br>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    {{-- @else --}}

    {{-- @endif --}}


    <!-- Bootstrap JS (Optional for some features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
