<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products =  Product::all();
            $productsTypes = ProductType::all();
            return view('product.index', compact('products', 'productsTypes'));
        }   catch (\Throwable $th) {
            return back()->with('erro', 'Não foi possível sua ação');
        }
    }

    public function store(ProductRequest $request)
    {
        try {
            $product = new Product();
            $product->description = $request->description;
            $product->quantity = $request->quantity;
            $product->value = $request->value;
            $product->product_types_id = $request->product_types_id;
            $product->save();
            return back()->with('mensagem', 'Produto cadastrado com sucesso!');
        }   catch (\Throwable $th) {
            return back()->with('erro', 'Não foi possível sua ação');
        }
    }

    public function update(ProductRequest $request, string $id)
    {
        try {
            $product = Product::where('id', $id)->first();

            $product->description = $request->description;
            $product->quantity = $request->quantity;
            $product->value = $request->value;
            $product->product_types_id = $request->product_types_id;
            $product->save();

            return back()->with('mensagem', 'Produto atualizado com sucesso!');
        }   catch (\Throwable $th) {
            return back()->with('erro', 'Não foi possível sua ação');
        }
    }

    public function destroy(string $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $product->delete();
            return back()->with('mensagem', 'Produto removido com sucesso!');
        }   catch (\Throwable $th) {
            return back()->with('erro', 'Não foi possível sua ação');
        }
    }
}
