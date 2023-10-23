<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\cart;
use App\Models\order;

class HomeController extends Controller
{
    public function redirect()
    {
        $user = Auth::user();

        if ($user)
        {
            $userType = $user->userType;

            if ($userType == '1')
            {
                $user=Auth()->user();
                $name = $user->name;
                $deliveredCount = order::where('status', 'Order is Successfully Delivered')->count();
                $OrdepisPlaced = order::where('status', 'Order is Placed')->count();
                $confirmedOrder = order::where('status', 'Order is Confirmed')->count();
                $readytopickup = order::where('status', 'Order is ready to pickup by rider')->count();
                $OutforDelivery = order::where('status', 'Order is Out for Delivery')->count();
                $cancelledOrder = order::where('status', 'Cancelled Order')->count();
                return view('admin.home', ['cancelledOrder' => $cancelledOrder,'OutforDelivery' => $OutforDelivery, 'readytopickup' => $readytopickup, 'confirmedOrder' => $confirmedOrder, 'deliveredCount' => $deliveredCount, 'placedorder' => $OrdepisPlaced, 'name' => $name]);
            }
            else
            {
                $data = product::paginate(3);
                $count = cart::where('user_id', $user->id)->count();
                return view('user.home', compact('data', 'count'));
            }
        }
        else
        {
            return redirect()->route('login');
        }
    }


    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
        $data = product::where('title', 'LIKE', '%' . $search . '%')->get();
        return view('user.home', compact('data'));
    }

    public function AboutUs()
    {
        $user=Auth()->user();
        if($user)
        {
            $cart=cart::where('user_id', $user->id)->get();
            $count=cart::where('user_id', $user->id)->count();
            return view('user.AboutUs', compact('count', 'cart'));
        }
        else
        {
            return view('user.AboutUs');
        }
        
    }

    public function Contact()
    {
        $user=Auth()->user();
        if($user)
        {
            $cart=cart::where('user_id', $user->id)->get();
            $count=cart::where('user_id', $user->id)->count();
            return view('user.Contact', compact('count', 'cart'));
        }
        else
        {
            return view('user.Contact');
        }
    }

    public function TrackOrder()
    {
        // Check if the user is logged in
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->get();
            $count = Cart::where('user_id', $user->id)->count();

            // Check if the user's userType is '0'
            if ($user->userType === '0') {
                // Retrieve orders for the logged-in user
                $order = Order::where('user_id', $user->id)->get();

                return view('user.TrackOrder', compact('order', 'count', 'cart'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function requestCancel(Request $request, $id)
    {
        $order=order::find($id);
        $order->status='Request to Cancel my Order';
        $order->save();

        return redirect()->back();
    }
}
