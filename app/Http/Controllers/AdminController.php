<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category', compact('data'));

    }

    public function add_category(Request $request)
    {

        $request->validate([
            'category' => 'required|string|max:255'
        ]);
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully');


    }
    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');

    }

    public function edit_category($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.edit_category', compact('data'));

    }


    public function update_category(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255'
        ]);
        $data = Category::findOrFail($id);
        $data->category_name = $request->category_name;
        $data->save();
        return redirect()->route('view_category')->with('success', 'Category Updated Successfully');

    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));

    }

    public function upload_product(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'quantity' => 'required|integer',
            'category' => 'required|string'
        ]);

        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->image = $request->image;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('productimage', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->route('view_product')->with('success', 'Product Added Successfully');

    }

    public function view_product()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.view_product', compact('products'));
    }

    public function delete_product($id)
    {
        $product = Product::findOrFail($id);
        $imagepath = public_path('productimage/' . $product->image);



        if (file_exists($imagepath)) {
            unlink($imagepath);

        }
        $product->delete();
        return redirect()->route('view_product')->with('success', 'Product Deleted Successfully');





    }
    public function edit_product($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit_product', compact('product', 'categories'));
    }
    public function update_product(request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'quantity' => 'required|integer',
            'category' => 'required|string'
        ]);

        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->save();

        if ($request->image != "") {
            File::delete(public_path('productimage/' . $product->image));

            //store new image

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $ext;
            $request->image->move('productimage', $imagename);
            $product->image = $imagename;
            $product->save();
        }
        return redirect()->route('view_product')->with('success', 'Product Updated Successfully');
    }

    public function product_search(request $request)
    {
        $search = $request->search;
        $products = Product::where('title', 'like', '%' . $search . '%')->
            orWhere('category', 'like', '%' . $search . '%')->paginate(5);
        return view('admin.view_product', compact('products'));
    }


}
