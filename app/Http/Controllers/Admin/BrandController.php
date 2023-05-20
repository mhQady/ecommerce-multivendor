<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\TempUploader;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Repositories\SQL\BrandRepository;
use App\Http\Requests\Vendor\BrandRequest;
use App\Repositories\Contracts\BrandContract;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BrandController extends Controller
{
    protected $brandRepo;
    public function __construct(BrandContract $brand)
    {
        $this->brandRepo = $brand;
    }
    public function index(): View
    {
        $brands = $this->brandRepo->findAll(pagination: 25, applyFilter: true);

        return view('admin.brands.index', compact('brands'));
    }

    public function create(): View
    {
        return view('admin.brands.create');
    }

    public function store(BrandRequest $request): RedirectResponse
    {
        $brand = $this->brandRepo->create($request->validated());

        TempUploader::reAssignMedia($brand, $request->image);

        toast(__('main.created.brand'), 'success');

        return to_route('admin.brands.index');
    }

    public function edit(Brand $brand): View
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $this->brandRepo->update($brand, $request->validated());

        toast(__('main.updated.brand'), 'success');

        return to_route('admin.brands.index');
    }

    public function destroy(Brand $brand)
    {
        $this->brandRepo->remove($brand);

        toast(__('main.deleted.brand'), 'success');

        return to_route('admin.brands.index');
    }
}