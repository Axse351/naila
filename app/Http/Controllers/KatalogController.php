<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class KatalogController extends Controller
{
    public function index(): View
    {
        $products = Product::aktif()->latest()->paginate(9);

        return view('user.katalog', compact('products'));
    }
}
