<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\cart;
use App\Models\order;
use App\Models\confirmed_orders;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function OurProducts(Request $request)
    {
        $search = $request->search;
        $user=Auth()->user();
        if($user)
        {
            $cart=cart::where('user_id', $user->id)->get();
            $count=cart::where('user_id', $user->id)->count();
            $data = product::all();
            return view('user.OurProducts', compact('data','count', 'cart'));
        }
        $data = product::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('user.OurProducts', compact('data'));
    }

    public function orderconfirmed(Request $request)
    {
        $user=Auth()->user();
        $user_id=$user->id;
        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;

        $confirmed_order = new confirmed_orders;

        // this will check if the cart is empty
        $cartCount = cart::where('user_id', $user_id)->count();

        if ($cartCount === 0) {
            return redirect()->back()->with('message', 'You cannot place an order when your cart is empty.');
        }
        
        // this is to get or make a random orderNumber
        do {
            $uniqueIdentifier = time();
            $currentDate = now()->format('Ymd');
            $orderNumber = $currentDate . $uniqueIdentifier;
            $orderNumber = (int) $orderNumber;
        } while (confirmed_orders::where('orderNumber', $orderNumber)->exists());

        $confirmed_order->orderNumber=$orderNumber;
        $confirmed_order->user_id=$user_id;
        $confirmed_order->name=$name;
        $confirmed_order->phone=$phone;
        $confirmed_order->address=$address;
        $confirmed_order->save();

        foreach($request->productname as $key=>$productname)
        {
            $order=new order;
            $order->product_name=$request->productname[$key];
            $order->price=$request->price[$key];
            $order->quantity=$request->quantity[$key];

            $order->name=$name;
            $order->user_id=$user_id;
            $order->phone=$phone;
            $order->address=$address;
            $order->status='Order is Placed';
            $order->orderNumber=$orderNumber;

            $order->save();
        }
        DB::table('carts')->where('phone', $phone)->delete();

        return redirect()->back()->with('message', 'Product Ordered Successfully');
    }

    public function showCart()
    {
        $user=Auth()->user();
        $cart=cart::where('user_id', $user->id)->get();
        $count=cart::where('user_id', $user->id)->count();
        $total = 0; // Initialize the total variable
        foreach ($cart as $carts) {
            // Calculate the subtotal for each item (price * quantity)
            $subtotal = $carts->product_price * $carts->product_quantity;
            $total += $subtotal; // Add the subtotal to the total
        }
        return view('user.showCart', compact('count', 'cart', 'total'));
    }

    public function deletecart($id)
    {
        $data=cart::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Product removed to the Cart Successfully');
    }

    public function addtocart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth()->user();
            $product=product::find($id);
            $cart=new cart;
            $cart->user_id=$user->id;
            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            $cart->product_price=$product->price;
            $cart->product_quantity = $request->input('quantity');
            $cart->save();
            return redirect()->back()->with('message', 'Product Added to Cart Successfully');
        }
        else
        {
            return redirect('login');
        }
    }
}
