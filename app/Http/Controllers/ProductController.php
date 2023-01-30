<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->with(['children'])->get();

        return view('admin.product.template', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product = Product::create([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id') ?? null,
            'amount' => $request->input('amount') ?? 0,
            'regular_price' => $request->input('regular_price'),
            'sale_price' => $request->input('sale_type') == 'percent' ? $request->input('regular_price') * (100 - $request->input('sale_price')) : $request->input('sale_price'),
            'status' => $request->input('status') ? 1 : 0,
            'is_hot' => $request->input('is_hot') ? 1 : 0,
            'is_featured' => $request->input('is_featured') ? 1 : 0,
            'description' => $request->input('description'),
            'content' => $request->input('content'),
        ]);

        if ($request->hasFile('featured_image')) {
            $faeturedImage = $request->file('featured_image');

            $nameFile = uniqid() . '_' . trim($faeturedImage->getClientOriginalName());
            $faeturedImage->storeAs('public/featured', $nameFile);

            Media::create([
                'mediable_type' => Product::class,
                'mediable_id'=> $product->id,
                'name' => $nameFile,
                'type' => 'featured',
            ]);
        }

        foreach ($request->document as $document) {
            moveImageToFolder($document, 'thumb');
            Media::create([
                'mediable_type' => Product::class,
                'mediable_id'=> $product->id,
                'name' => $document,
                'type' => 'thumb',
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Create Product Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $categories = Category::where('parent_id', 0)->with(['children'])->get();

        return view('admin.product.template', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
