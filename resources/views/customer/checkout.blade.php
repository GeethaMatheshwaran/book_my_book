<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Optional custom styles */
        /* You can add your own custom styles here */
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 align="center">My Checkout</h1><br><br>
        <a href="{{ route('customer.product.list') }}" class="corner-link" target="_blank">View Books</a>
        <form action="{{ route('placeOrder') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th class="text-end">Quantity</th>
                                <th class="text-end">Price</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $overallTotal = 0; // Initialize overall total variable
                            @endphp
                            @foreach ($cartItems as $cartItem)
                            <tr>
                                <td>{{ $cartItem->product->name }}</td>
                                <td class="text-end">{{ $cartItem->quantity }}</td>
                                <td class="text-end">Rs. {{ $cartItem->product->price }}</td>
                                <td class="text-end">Rs. {{ $cartItem->quantity * $cartItem->product->price }}</td>
                            </tr>
                            <!-- Hidden input field to store cart item IDs -->
                            <input type="hidden" name="cartItemIds[]" value="{{ $cartItem->id }}">
                            @php
                            // Calculate individual total for each item
                            $itemTotal = $cartItem->quantity * $cartItem->product->price;
                            // Accumulate individual totals to calculate overall total
                            $overallTotal += $itemTotal;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Overall Total:</td>
                                <td class="text-end fw-bold">Rs. {{ $overallTotal }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Hidden input field to store overall total -->
                    <input type="hidden" id="hidden_overallTotal" name="hidden_overallTotal" value="{{ $overallTotal }}">
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </div>
            </div>
        </form>
    </div>
    <form method="POST" action="{{ route('place.order') }}">
        @csrf
        <!-- Other form fields -->

        <button type="submit">Mail Place Order</button>
    </form>


    <!-- Bootstrap JS (Optional for some features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
