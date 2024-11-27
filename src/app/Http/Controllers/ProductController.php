<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('sort')) {
            $query->orderBy('price', $request->sort === 'asc' ? 'asc' : 'desc');
        }

        $products = $query->paginate(6);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.register');
    }

    public function store(ProductRequest $request)
    {
        // 新規商品作成
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->seasons = json_encode($request->seasons);
        $product->description = $request->description;

        // 画像保存
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images/fruits-img');
            $product->image = basename($path);
        }
        $product->save();

        return redirect()->route('products.index')->with('success', '商品を登録しました。');
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);

        return view('products.show', compact('product'));
    }

    public function update(ProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->seasons = json_encode($request->seasons);
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images/fruits-img');
            $product->image = basename($path);
        }

        $product->save();

        return redirect()->route('products.index')->with('success', '商品情報を更新しました。');
    }

    public function destroy($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();

        return redirect()->route('products.index')->with('success', '商品情報を削除しました。');
    }
}
