<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\RawMaterialCategoryStoreRequest;
use App\Models\RawMaterialCategory;
use App\View\Components\Actions;
use App\View\Components\CreatedBy;
use App\View\Components\Description;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class RawMaterialCategoryController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.raw-material-categories.index');
    }

    public function store(RawMaterialCategoryStoreRequest $request)
    {
        try {
            RawMaterialCategory::insert($request->except(['_token']));

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

    public function update(Request $request, string $id)
    {
        try {
            $rawMaterialCategory = RawMaterialCategory::findOrFail($id);
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

    public function destroy(string $id)
    {
        try {
            $rawMaterialCategory = RawMaterialCategory::findOrFail($id);
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
        $rawMaterialCategories = RawMaterialCategory::all()->map(function ($rawMaterialCategory) {
            $rawMaterialCategory->actions = (new Actions(
                [
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
                ]
            ))->render()->render();
            $rawMaterialCategory->status = (new StatusBadge($rawMaterialCategory->status))->render()->render();
            $rawMaterialCategory->description = (new Description($rawMaterialCategory->description))->render()->render();
            $rawMaterialCategory->createdBy = (new CreatedBy($rawMaterialCategory->createdBy))->render()->render();
            return $rawMaterialCategory;
        });
        return $rawMaterialCategories;
    }
}
