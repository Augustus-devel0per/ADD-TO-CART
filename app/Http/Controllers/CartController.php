<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // CART
    public function cart(){
        return view('cart');
    }

    public function cartStore(Request $request){
        $cartItem = new Cart();

        // Get ID of the authenticated user ---
        $cartItem->user_id = Auth::user(); 

        $cartItem->ticket_id = $request->input('ticket_id');
        $cartItem->ticket_number = $request->input('ticket_number');
        $cartItem->ticket_price = $request->input('ticket_amount');
        $cartItem->ticket_quantity = $request->input('ticket_quantity');

        dd($cartItem);

        // $cartItem->save();
        // return response()->json([
        //     'status' => 200,
        //     'errors' => "Employee has been successfully added"
        // ]);
       
    }
}
