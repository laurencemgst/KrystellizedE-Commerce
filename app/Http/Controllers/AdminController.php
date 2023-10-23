<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->userType=='1')
            {
                return view('admin.product');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function uploadproduct(Request $request)
    {
        $data = new Product;
        $image = $request->file('file');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move('productimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->input('title');
        $data->price = $request->input('price');
        $data->description = $request->input('des');
        $data->quantity = $request->input('quantity');

        $data->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function showproduct()
    {
        if(Auth::user()->userType=='1')
        {
            $data = product::all();
            return view('admin.showproduct', compact('data'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function deleteproduct($id)
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted!');
    }

    public function updateproductview($id)
    {
        $data = product::find($id);
        return view('admin.updateproductview', ['data' => $data]);
    }

    public function updateproduct(Request $request, $id)
    {
        $data = product::find($id);
        $image = $request->file('file');
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('productimage', $imagename);
            $data->image = $imagename;
        }
        $data->title = $request->input('title');
        $data->price = $request->input('price');
        $data->description = $request->input('des');
        $data->quantity = $request->input('quantity');

        $data->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function showorder()
    {
        if(Auth::user()->userType=='1')
        {
            $order=order::all();
            return view('admin.showorder', compact('order'));
        }
        else
        {
        return redirect('/');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        if ($order->status === "Order is Successfully Delivered") {
            // If the status is "Order is Successfully Delivered," do not update it further.
            return redirect()->back()->with('error', 'Order has already been successfully delivered.');
        }
        elseif ($order->status === "Cancelled Order"){
            return redirect()->back()->with('error', 'Cancelled Order cannot be processed.');
        }

        $order->status = $request->input('status');
        $order->save();

        return redirect()->back();
    }

}
