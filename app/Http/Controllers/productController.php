<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function home(){
        $products = Product::all();
        return view('home', compact('products'));
    }
    public function showproduct($id){
        $product = Product::find($id);
        if (!$product) {
            abort(404, 'Product not found');
        }
        return view('showproduct', compact('product'));
    }
}

