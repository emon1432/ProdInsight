<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\RawMaterialCategoryRequest;
use App\Models\RawMaterialCategory;
use App\View\Components\Actions;
use App\View\Components\ActionBy;
use App\View\Components\Description;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class RawMaterialCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.raw-material-categories.index');
    }

    public function store(RawMaterialCategoryRequest $request)
    {
        try {
            RawMaterialCategory::create($request->except(['_token']));

            return response()->json([
                'status' => 200,
                'message' => __('Raw Material Category created successfully'),
                'redirect' => route('raw-material-categories.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function update(RawMaterialCategoryRequest $request, RawMaterialCategory $rawMaterialCategory)
    {
        try {
            $rawMaterialCategory->update($request->except(['_token', '_method']));

            return response()->json([
                'status' => 200,
                'message' => __('Raw Material Category updated successfully'),
                'redirect' => route('raw-material-categories.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function destroy(RawMaterialCategory $rawMaterialCategory)
    {
        try {
            $rawMaterialCategory->delete();

            return response()->json([
                'status' => 200,
                'message' => __('Raw Material Category deleted successfully'),
                'redirect' => route('raw-material-categories.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    private function data()
    {
        return RawMaterialCategory::all()->map(function ($rawMaterialCategory) {
            $rawMaterialCategory->actions = (new Actions([
                'model' => $rawMaterialCategory,
                'resource' => 'raw-material-categories',
                'buttons' => [
                    'basic' => [
                        'view' => false,
                        'edit' => [
                            'modal' => true,
                        ],
                        'delete' => true,
                    ],
                ],
            ]))->render()->render();
            $rawMaterialCategory->status = (new StatusBadge($rawMaterialCategory->status))->render()->render();
            $rawMaterialCategory->description = (new Description($rawMaterialCategory->description))->render()->render();
            $rawMaterialCategory->createdBy = (new ActionBy($rawMaterialCategory->createdBy))->render()->render();
            return $rawMaterialCategory;
        })->toArray();
    }
}
