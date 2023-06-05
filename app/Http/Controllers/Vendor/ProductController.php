<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\Product\StoreProductRequest;
use App\Http\Requests\Vendor\Product\UpdateProductRequest;
use App\Repositories\Contracts\BrandContract;
use App\Repositories\Contracts\ProductContract;

class ProductController extends Controller
{
    public function __construct(protected ProductContract $productRepo)
    {
    }
    public function index()
    {
        $products = $this->productRepo->findAll(
            pagination: 25,
            applyFilter: true,
            condition: ['key' => 'vendor_id', 'value' => auth('vendor')->id()]
        );

        return view('vendor.products.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BrandContract $brandRepo)
    {
        $brands = $brandRepo->findAll(fields: ['id', 'name']);

        return view('vendor.products.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->productRepo->create($request->validated());

        toast(__('main.created.product'), 'success');

        return to_route('vendor.products.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}