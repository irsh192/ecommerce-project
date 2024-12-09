<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home()
    {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }
    public function login_home()
    {
        $product = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));

    }
    public function product_details($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.product_details', compact('product', 'categories', 'count'));
    }
    public function add_cart($id)
    {
        try {
            $product_id = $id;
            $user = Auth::user();
            if (!$user) {
                return redirect()->back()->withErrors('User not logged in');
            }

            $user_id = $user->id;
            \Log::info('CART_ADD_DEBUG: Adding to cart - User ID: ' . $user_id . ', Product ID: ' . $product_id);

            $data = new Cart();
            $data->user_id = $user_id;
            $data->product_id = $product_id;
            $data->save();

            flash()->success('Product added to cart successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error: ' . $e->getMessage());
        }



    }

    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $carts = Cart::where('user_id', $userid)->get();
        }
        return view('home.mycart', compact('count', 'carts'));
    }



}