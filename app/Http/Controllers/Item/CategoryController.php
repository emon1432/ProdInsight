<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\View\Components\Actions;
use App\View\Components\ItemInfo;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $view = $request->get('view', '');

        if ($request->ajax()) {
            return response()->json($view === 'tree' ? $this->treeData() : $this->data());
        }

        return $view === 'tree'
            ? view('pages.categories.tree')
            : view('pages.categories.index');
    }

    public function create()
    {
        $lastCategory = Category::orderBy('id', 'desc')->where('code', 'like', 'CAT-%')->first()->code ?? 'CAT-000';
        $nextCategoryCode = 'CAT-' . str_pad((int) substr($lastCategory, 4) + 1, 3, '0', STR_PAD_LEFT);
        $categories = Category::orderBy('name')->where('status', 'Active')->get();
        return view('pages.categories.create', compact('nextCategoryCode', 'categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        try {
            Category::create($request->except(['_token', 'image']));
            if ($request->hasFile('image')) {
                $image = imageUploadManager($request->file('image'), $request->slug, 'categories');
                Category::where('slug', $request->slug)->update(['image' => $image]);
            }
            return response()->json([
                'status' => 200,
                'message' => __('Category created successfully'),
                'redirect' => route('categories.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ]);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Category $category)
    {
        $categories = Category::orderBy('name')->where('status', 'Active')->get();
        return view('pages.categories.edit', compact('category', 'categories'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {
            $category->update($request->except(['_token', 'image']));
            if ($request->hasFile('image')) {
                $image = imageUpdateManager($request->file('image'), $request->slug, 'categories', $category->image);
                $category->update(['image' => $image]);
            }
            return response()->json([
                'status' => 200,
                'message' => __('Category updated successfully'),
                'redirect' => route('categories.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ]);
        }
    }

    public function destroy(Category $category)
    {
        try {
            if ($category->image) {
                imageDeleteManager($category->image);
            }
            $category->delete();
            return response()->json([
                'status' => 200,
                'message' => __('Category deleted successfully'),
                'redirect' => route('categories.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ]);
        }
    }

    private function data()
    {
        return Category::all()->map(function ($category) {
            $category->actions = (new Actions([
                'model' => $category,
                'resource' => 'categories',
                'buttons' => [
                    'basic' => [
                        'view' => true,
                        'edit' => true,
                        'delete' => true,
                    ],
                ],
            ]))->render()->render();
            $category->itemInfo = (new ItemInfo($category->name, $category->image, $category->code, $category->barcode))->render()->render();
            $category->parentCategory = Category::find($category->parent_id)?->name ?? __('N/A');
            $category->status = (new StatusBadge($category->status))->render()->render();
            return $category;
        })->toArray();
    }

    private function treeData()
    {
        $categories = Category::all();

        $map = [];
        foreach ($categories as $cat) {
            $map[$cat->id] = [
                'id' => $cat->id,
                'text' => $cat->name,
                'children' => [],
            ];
        }

        $tree = [];
        foreach ($categories as $cat) {
            if ($cat->parent_id && isset($map[$cat->parent_id])) {
                $map[$cat->parent_id]['children'][] = &$map[$cat->id];
            } else {
                $tree[] = &$map[$cat->id];
            }
        }

        return $tree;
    }
}
