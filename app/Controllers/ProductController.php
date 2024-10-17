<?php

namespace App\Controllers;

use App\Models\Product;
use App\Core\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $this->view('products/index', ['products' => $products]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Product::create($_POST);
            header("Location: /products");
            exit;
        }
        $this->view('products/create');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product->update($_POST);
            header("Location: /products");
            exit;
        }

        $this->view('products/edit', ['product' => $product]);
    }

    public function delete($id)
    {
        $product = Product::find($id); // Find product by ID
        $product->delete(); // Delete product
        header("Location: /products");
        exit;
    }
}
