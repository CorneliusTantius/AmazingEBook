<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Ebook;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        return View('pages.index', ["books" => Ebook::paginate(5)]);
    }

    public function detail($id)
    {
        $book = Ebook::find($id);
        return View('pages.detail', ['book' => $book]);
    }

    public function addtocart($id)
    {
        $userid = Auth::user()->account_id;
        $existing = Order::whereRaw('account_id = ' . $userid . ' and ebook_id = ' . $id)->first();
        if ($existing === null) {
            $order = new Order();
            $order->account_id = $userid;
            $order->ebook_id = $id;
            $order->save();
        }
        return back();
    }
    public function setlanguage($lang)
    {
        app()->setLocale($lang);
        session()->put('locale', $lang);
        return redirect('/');
    }
}
