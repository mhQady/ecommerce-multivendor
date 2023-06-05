<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\TempUploader;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Enums\Category\CategoryStatus;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Contracts\CategoryContract;

class CategoryController extends Controller
{

    protected $guarded = ['id'];
    public $translatable = ['name'];

    public function __construct(protected CategoryContract $categoryRepo)
    {
    }
    public function index()
    {
        $categories = $this->categoryRepo->findAll(pagination: 25, applyFilter: true, relations: ['parent']);

        return $categories;
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepo
            ->findAll(fields: ['id', 'parent_id', 'name', 'status'], doesntHave: 'parent.parent', condition: ['key' => 'status', 'value' => CategoryStatus::PUBLISHED->value]);

        return view('admin.categories.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        DB::transaction(function () use ($request) {

            $category = $this->categoryRepo->create($request->validated());

            TempUploader::reAssignMedia($category, $request->image);
        });

        toast(__('main.created.category'), 'success');

        return to_route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}