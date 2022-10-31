<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd(session()->flash('message', 'test1'),session('message') );
        /* $products = Product::orderBy('id', 'desc')->where('status', true);
        if($request->code) {
            //$products->where('code', $request->code);
            $products->where('code', 'like', '%'.$request->code.'%');
        }
        if($request->stock) {
            $products->where('stock', '>=', $request->stock);
        }
        if($request->category) {
            $categoryIds = Category::where('name', 'like', '%'.$request->category.'%')->pluck('id');
            //dd($categoryIds);
            $products->whereIn('category_id', $categoryIds);
        }
        $products = $products->with('category')->paginate(10); */

        $products = Product::orderBy('id', 'desc')
            ->filterCode($request->code)
            ->filterGraterStock($request->stock)
            ->filterCategory($request->category)
            ->with('category')->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        $categories_pluck = Category::pluck('name', 'id');
        return view('products.create', compact('categories', 'categories_pluck'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        //dd($request->all());
        //Product::create($request->all());
        /*
        its ok but could be better
        $request->validate([
            'name' => 'required',
            'stock' => 'required',
        ]);
        */

        $input = $request->all();
        //$input['code'] = str_pad($input['code'], 6, "0", STR_PAD_LEFT);

        Product::create($input);
        
        return redirect()->route('products.index')
            ->with('success','Product created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    /* public function show($product)
    {
        $product = Product::find($product);

        if(empty($product)) {
            return redirect()->route('products.index')
            ->with('success','Product not found.');
        }

        return view('products.show', compact('product'));
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        //dd($request->all(), $product);
        /* $product->name = 'asddStatic';
        $product->save(); */
        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','Product deleted successfully.');
    }
}
