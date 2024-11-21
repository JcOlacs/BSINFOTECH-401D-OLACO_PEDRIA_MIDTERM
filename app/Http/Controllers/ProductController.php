<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function showAdmin(Request $request)
    {
        $products = Product::paginate(10);
        return view("products.admin", compact("products"));
    }

    public function index()
    {
        $desserts = Product::where('dish_type', 'dessert')->get();
        $breakfasts = Product::where('dish_type', 'breakfast')->get();
        $lunches = Product::where('dish_type', 'lunch')->get();
        $dinners = Product::where('dish_type', 'dinner')->get();

        return view("products.index", compact("desserts", "breakfasts", "lunches", "dinners"));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "dish_type"=>"required|string|max:255",
            "name"=>"required|string|max:255",
            "description"=>"required|string|max:255",
            "price"=>"required|numeric",
            "image"=>"required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        if ($request->hasFile('image'))
        {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);

            $validate['image'] = 'images/' . $imageName;
        }

        Product::create($validate);
        return redirect()->route("products.admin")->with("success","New Dish Added to Database");
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            "dish_type"=> "required|string|max:255",
            "name"=> "required|string|max:255",
            "description"=> "required|string|max:255",
            "price"=> "required|numeric",
            "image"=> "nullable|required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $product = Product::findOrFail( $id );

        if($request->hasFile("image"))
        {
            $imageName = time() . "_" . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);

            $validate['image'] = 'images/'. $imageName;

            if($product->image && file_exists(public_path($product->image)))
            {
                unlink(public_path($product->image));
            }
        }

        $product->update($validate);

        return redirect()->route("products.admin")->with("success","Dish Information Updated");
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view("products.admin", compact("product"));
    }

    public function delete(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path($product->image)))
        {
            unlink(public_path($product->image));
        }

        $product->delete();
        return redirect()->route("products.admin")->with("success","Data deleted in the database");
    }

}
