<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userid = Auth::user()->account_id;
        $orders = Order::whereRaw('account_id = ' . $userid)->paginate(5);
        return View('pages.user.cart', ['orders' => $orders]);
    }
    public function delete($id)
    {
        Order::find($id)->delete();
        return back();
    }
    public function checkout()
    {
        $orders = Order::where('account_id', Auth::user()->account_id)->get();
        foreach ($orders as $order) {
            $order->delete();
        }
        return back();
    }
}
