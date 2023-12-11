<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Mail\PlaceOrderMail;
use Illuminate\Support\Facades\Mail;


class CustomerCartController extends Controller {
    // In your Controller method handling the "Add to Cart" action

    public function addToCart(Request $request, $bookId) {
        if(Auth::check()) {
            $userId = Auth::id();
            $quantity = $request->input('quantity'); // Get the quantity from the input field

            // Check if the item already exists in the cart
            $existingCartItem = Cart::where('user_id', $userId)
            ->whereNull('status') // Check for null status
            ->where('book_id', $bookId)
            ->first();


            if($existingCartItem) {
                // If the item exists, update the quantity
                $existingCartItem->update(['quantity' => $existingCartItem->quantity + $quantity]);
            } else {
                // If the item doesn't exist, create a new cart item
                Cart::create([
                    'user_id' => $userId,
                    'book_id' => $bookId,
                    'quantity' => $quantity,
                ]);
            }

            return redirect()->back()->with('success', 'Book added to cart successfully');
        } else {
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }
    }

    public function checkout() {
        // Get the current authenticated user's ID
        $userId = Auth::id();

        // Retrieve cart items for the logged-in user
        $cartItems = Cart::where('user_id', $userId)
            ->where('status')
            ->with('product') // Assuming a relationship between Cart and Book models
            ->get();

        // Return the cart items to a view for displaying checkout details
        return view('customer.checkout', ['cartItems' => $cartItems]);
    }

    public function placeOrder(Request $request) {
        // Get the user ID (you might need to adjust this based on your authentication logic)
        $userId = auth()->user()->id;

        // Calculate the overall total (you can get it from the previous step or re-calculate)
        // $hidden_total_price = $request->input('hidden_overallTotal');
        $hidden_total_price = $request->input('hidden_overallTotal');
        // Create a new order
        $order = new Order();
        $order->user_id = $userId;
        $order->total_price = $hidden_total_price;
        $order->created_date = now(); // Set the current date/time
        $order->status = 'completed';
        $order->save();

        //
        // Get the cart item IDs from the form submission
        $cartItemIds = $request->input('cartItemIds');

        // dd($cartItemIds);
        // Update the status to 'completed' for cart items with the retrieved IDs
        Cart::whereIn('id', $cartItemIds)->update(['status' => 'completed']);

        return redirect()->route('customer.product.list');
    }

    public function mail_placeOrder(Request $request)
    {
        // Logic to place order...

        // Send email
        Mail::to('msangeethaece210@gmail.com')->send(new PlaceOrderMail());

        // return redirect()->back()->with('success', 'Order placed successfully.');
    }

}
