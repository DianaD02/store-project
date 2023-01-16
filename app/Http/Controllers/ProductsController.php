<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    public function DisplayProductsList()
    {
        $data = Product::all();
        return view('products')->with('products', $data);
    }


    public function DisplayCreateProductPage()
    {
        return view('createproduct');
    }

    public function CreateNewProduct(Request $req)
    {
        // Save image on server
        $image = $req->file('gallery');

        $fileName = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $fileName);

        // Add product to database
        $product = new Product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->description = $req->description;
        $product->image = $fileName;

        $product->save();

        return redirect('/products');

    }

    public function DeleteProduct($id)
    {
        $targetedProduct = Product::find($id);

        $targetedProduct->forceDelete();

        return redirect('/products');
    }

    public function EditProduct($id)
    {
        return view('/editproduct', ['productId' => $id]);
    }

    public static function GetProductInfo($id)
    {
        return Product::find($id);
    }

    public function ModifyProduct(Request $req)
    {

        DB::update('UPDATE products SET name = ?, price = ?, description = ? WHERE id = ?',[$req->name, $req->price, $req->description, $req->id]);

        return redirect("/products");
    }

    public function AddToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cartItems = [];
            
            if($req->session()->has('cart'))
            {
                $cartItems = session()->get('cart');
                array_push($cartItems, $req->product_id);
            }

            session()->put('cart', $cartItems);

            return redirect('/cartlist');

        }
        else
        {
            return redirect('login');
        }
    }

    public function CartList()
    {
        $products = [];

        if(session()->has('cart'))
        {
            $products = session()->get('cart');
        }

        return view('cart', ['products' => $products]);

    }

    public static function GetProductById($id)
    {
        return Product::where(['id' => $id])->first();
    }

    public function RemoveProductFromCart($id)
    {
        $cartItems = session()->get('cart');

        $key = array_search($id, $cartItems);
        unset($cartItems[$key]);

        session()->forget('cart');
        session()->put('cart', $cartItems);
        return redirect('/cartlist');
    }
}