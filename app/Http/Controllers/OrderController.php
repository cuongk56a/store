<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $category;
    private $product;

    public function __construct(Product $product, Category $category)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function addToCart($id, Request $request){
        $product=$this->product->find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $request->quantity;
        } else {
            $cart[$id]=[
                'id' => $id,
                'name' => $product->name,
                'image_path' => $product->feature_image_path,
                'price' => $product->price,
                'quantity' => $request->quantity
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }

    public function showCart(){
        $carts = session()->get('cart');
        return view('auth.cart', compact('carts'));
    }

    public function updateCart(Request $request){
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity']=$request->quantity;
            session()->put('cart', $carts);
            $cartView = view('auth.components.cartContent', compact('carts'))->render();
            return response()->json(['cart_view'=>$cartView, 'code'=>200],200);
        }
    }

    public function deleteCart(Request $request){
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $cartView = view('auth.components.cartContent', compact('carts'))->render();
            return response()->json(['cart_view'=>$cartView, 'code'=>200],200);
        }
    }
}
