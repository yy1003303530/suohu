<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function home(Request $request)
    {
        $page = $request->get('page', 2);
        $per_page = $request->get('per_page', 10);

        $products = Product::all()->forPage($page, $per_page)->toArray();

        return view('home', ['products'=>$products]);
    }
}
