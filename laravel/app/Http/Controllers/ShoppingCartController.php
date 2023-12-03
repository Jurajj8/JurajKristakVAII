<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Torta;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->shoppingCart ?? collect(); // V prípade, že košík nie je definovaný, použite prázdnu kolekciu
        return view('shopping-cart.index', compact('cartItems'));
    }

    public function addToCart($tortaId)
    {
        $user = auth()->user();
        $torta = Torta::findOrFail($tortaId);

        $cartItem = $user->shoppingCart->where('torta_id', $torta->id)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + 1]);
        } else {
            /** @var \App\Models\User $user **/
            $user->shoppingCart()->create([
                'torta_id' => $torta->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('shopping-cart.index');
    }

    public function removeFromCart($tortaId)
    {
        $user = auth()->user();
        $torta = Torta::findOrFail($tortaId);
        /** @var \App\Models\User $user **/
        $user->shoppingCart()->where('torta_id', $torta->id)->delete();

        return redirect()->route('shopping-cart.index');
    }

    public function updateQuantity(Request $request, $tortaId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $user = auth()->user();
    $torta = Torta::findOrFail($tortaId);

    $cartItem = $user->shoppingCart->where('torta_id', $torta->id)->first();

    if ($cartItem) {
        $cartItem->update(['quantity' => $request->input('quantity')]);
    }

    return redirect()->route('shopping-cart.index');
}
}