<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\RawMaterialStoreRequest;
use App\Http\Requests\RawMaterialUpdateRequest;
use App\Models\RawMaterial;
use App\Models\RawMaterialCategory;
use App\Models\Unit;
use App\View\Components\Actions;
use App\View\Components\ItemInfo;
use App\View\Components\StatusBadge;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json($this->data());
        }
        return view('pages.raw-materials.index');
    }

    public function create()
    {
        $rawMaterialCategories = RawMaterialCategory::orderBy('name')->where('status', 'Active')->get();
        $units = Unit::orderBy('name')->where('status', 'Active')->get();
        $lastRawMaterial = RawMaterial::orderBy('id', 'desc')->where('code', 'like', 'RM-%')->first()->code ?? 'RM-000';
        $nextRawMaterialCode = 'RM-' . str_pad((int) substr($lastRawMaterial, 3) + 1, 3, '0', STR_PAD_LEFT);
        return view('pages.raw-materials.create', compact('rawMaterialCategories', 'units', 'nextRawMaterialCode'));
    }

    public function store(RawMaterialStoreRequest $request)
    {
        try {
            if ($request->different_consumption == 0) {
                $request->merge([
                    'consumption_unit_id' => $request->purchase_unit_id,
                    'conversion_rate' => 1,
                    'consumption_price' => $request->purchase_price,
                ]);
            }

            RawMaterial::create($request->except(['_token', 'different_consumption', 'image']));
            if ($request->hasFile('image')) {
                $image = imageUploadManager($request->file('image'), slugify($request->name), 'raw-materials');
                RawMaterial::where('slug', $request->slug)->update(['image' => $image]);
            }
            return response()->json([
                'status' => 200,
                'message' => __('Raw Material created successfully'),
                'redirect' => route('raw-materials.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(RawMaterial $rawMaterial)
    {
        $rawMaterialCategories = RawMaterialCategory::orderBy('name')->where('status', 'Active')->get();
        $units = Unit::orderBy('name')->where('status', 'Active')->get();
        return view('pages.raw-materials.edit', compact('rawMaterial', 'rawMaterialCategories', 'units'));
    }

    public function update(RawMaterialUpdateRequest $request, RawMaterial $rawMaterial)
    {
        try {
            if ($request->different_consumption == 0) {
                $request->merge([
                    'consumption_unit_id' => $request->purchase_unit_id,
                    'conversion_rate' => 1,
                    'consumption_price' => $request->purchase_price,
                ]);
            }

            $updateData = $request->except(['_token', '_method', 'different_consumption', 'image']);
            $rawMaterial->update($updateData);

            if ($request->hasFile('image')) {
                $image = imageUpdateManager($request->file('image'), slugify($request->name), 'raw-materials', $rawMaterial->image);
                $rawMaterial->update(['image' => $image]);
            }

            return response()->json([
                'status' => 200,
                'message' => __('Raw Material updated successfully'),
                'redirect' => route('raw-materials.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => __('Whoops! Something went wrong. Please try again later. Error: ') . $e->getMessage(),
                'redirect' => null,
            ], 500);
        }
    }

    public function destroy(RawMaterial $rawMaterial)
    {
        try {
            if ($rawMaterial->image) {
                imageDeleteManager($rawMaterial->image, 'raw-materials');
            }
            $rawMaterial->delete();
            return response()->json([
                'status' => 200,
                'message' => __('Raw Material deleted successfully'),
                'redirect' => route('raw-materials.index'),
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
        return RawMaterial::all()->map(function ($rawMaterial) {
            $rawMaterial->actions = (new Actions([
                'model' => $rawMaterial,
                'resource' => 'raw-materials',
                'buttons' => [
                    'basic' => [
                        'view' => true,
                        'edit' => true,
                        'delete' => true,
                    ],
                ],
            ]))->render()->render();
            $rawMaterial->itemInfo = (new ItemInfo($rawMaterial->name, $rawMaterial->image, $rawMaterial->code, $rawMaterial->barcode))->render()->render();
            $rawMaterial->category = $rawMaterial->rawMaterialCategory->name ?? 'N/A';
            $rawMaterial->purchasePricePerUnit = amount_format($rawMaterial->purchase_price) . '/' . $rawMaterial->purchaseUnit->name;
            $rawMaterial->consumptionPricePerUnit = amount_format($rawMaterial->consumption_price) . '/' . $rawMaterial->consumptionUnit->name;
            $rawMaterial->stock = unit_conversion($rawMaterial->stock, $rawMaterial->purchaseUnit->name, $rawMaterial->consumptionUnit->name, $rawMaterial->conversion_rate);
            $rawMaterial->status = (new StatusBadge($rawMaterial->status))->render()->render();
            return $rawMaterial;
        })->toArray();
    }
}
