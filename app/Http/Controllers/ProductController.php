<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    private $model = Product::class;
    private $controller = self::class;

    public function __construct()
    {
        View::share('model', $this->model);
        View::share('controller', $this->controller);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.products.index', ['products' => Product::availableProducts()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'article' => $request->article,
            'name' => $request->name,
            'status' => array_search($request->status, Product::$statuses),
            'data' => $request->data
        ]);
        return response()->json(['success' => 'Успешно добавлено!', 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->article !== $product->article)
            if (!Auth::user() || Auth::user()->role->name !== config('products.role'))
                return response()->json(['permission' => 'Изменение Артикула запрещено, войдите под администратором']);

        $product->update([
            'article' => $request->article,
            'name' => $request->name,
            'status' => array_search($request->status, Product::$statuses),
            'data' => $request->data
        ]);
        return response()->json(['success' => 'Успешно изменено!', 'product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        return response()->json(['success' => 'Успешно!']);
    }

    public function getProducts()
    {
        return response()->json(Product::availableProducts());
    }
}
